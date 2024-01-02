<?php

namespace App\Http\Controllers\travelista;

use App\Http\Controllers\Controller;
use App\Mail\bookingmail;
use App\Mail\UserNotifymail;
use App\Models\BillingDetails;
use App\Models\BookedVilla;
use App\Models\Payment;
use App\Models\User;
use App\Models\Villas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\PaymentIntent;


class BookingController extends Controller
{
    public function bookvilla(Request $request)
    {
        $request->validate([
            'guestName' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required|numeric',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'totaldays' => 'required|numeric',
            'total_price' => 'required|numeric',
            'numOfGuests' => 'required|numeric',
            'payment_method' => 'required',
            'house_number' => 'required',
            'City' => 'required',
            'State' => 'required',
            'Country' => 'required'
        ]);
        try {
            $billing_address = BillingDetails::where('email', $request->email)->first();
            $user = User::where('email', $request->email)->first();
            if ($billing_address) {
                $billing_address->update([
                    'name' => $request->guestName,
                    'email' => $request->email,
                    'Contact_number' => $request->contact_number,
                    'house_number' => $request->house_number,
                    'city' => $request->City,
                    'state' => $request->State,
                    'country' => $request->Country,
                ]);
                $billing_id = $billing_address->id;
                $user = User::find($billing_address->user_id);
            } else if ($user) {
                $new_billing = new BillingDetails();
                $new_billing->user_id = $user->id;
                $new_billing->name = $request->guestName;
                $new_billing->email = $request->email;
                $new_billing->Contact_number = $request->contact_number;
                $new_billing->house_number = $request->house_number;
                $new_billing->city = $request->City;
                $new_billing->state = $request->State;
                $new_billing->country = $request->Country;
                $new_billing->save();
                $billing_id = $new_billing->id;
            } else {
                // create new user 
                $new_user = new User();
                $new_user->name = $request->guestName;
                $new_user->email = $request->email;
                $new_user->mobile_number = $request->contact_number;
                $new_user->password = $request->email;
                $new_user->on_booking = true;
                $new_user->save();
                $user = $new_user;

                $new_billing = new BillingDetails();
                $new_billing->user_id = $new_user->id;
                $new_billing->name = $request->guestName;
                $new_billing->email = $request->email;
                $new_billing->Contact_number = $request->contact_number;
                $new_billing->house_number = $request->house_number;
                $new_billing->city = $request->City;
                $new_billing->state = $request->State;
                $new_billing->country = $request->Country;
                $new_billing->save();
                $billing_id = $new_billing->id;
            }

            // booking details 
            $BookingNumber = 'BN_' . str::random(8);
            $booking = new BookedVilla();
            $booking->booking_number = $BookingNumber;
            $booking->villa_id = $request->villa_id;
            $booking->billing_details_id = $billing_id;
            $booking->checkin_date = Carbon::createFromFormat('F j, Y', $request->checkin_date)->format('Y-m-d');
            $booking->checkout_date = Carbon::createFromFormat('F j, Y', $request->checkout_date)->format('Y-m-d');
            $booking->number_guests = $request->numOfGuests;

            // stripe key //
            $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));

            // stripe customer //
            if ($user->customer_stripe_id) {
                $customer_id = $user->customer_stripe_id;
            } else {
                $customer = Customer::create([
                    'name' => $request->guestName,
                    'address' => [
                        'line1' => $request->house_number,
                        'postal_code' => '132054',
                        'city' => $request->City,
                        'state' => $request->State,
                        'country' => 'us',
                    ],
                    'payment_method' => $request->payment_method,
                ]);
                $user->update(['customer_stripe_id' => $customer->id]);

                $customer_id = $customer->id;

            }
            $paymentIntent = PaymentIntent::create([
                'amount' => (int) $request->total_price * 100,
                'currency' => 'inr',
                'customer' => $customer_id,
                'payment_method' => $request->payment_method,
                'metadata' => ['booking_id' => $request->booking_number],
                'confirm' => true,
                'off_session' => true,
                'description' => 'Booking payment',
            ]);

            $clientsecret = $paymentIntent->client_secret;
            
            $villa = Villas::find($request->villa_id);

            if ($paymentIntent->status === 'succeeded') {

                $booking->Total_price = $paymentIntent->amount;
                $booking->payment_id = $paymentIntent->id;
                $booking->booking_status = "confirmed";
                $booking->save();

                if ($booking) {
                    $payment = new Payment();
                    $payment->user_id = $billing_id;
                    $payment->booking_number = $booking->booking_number;
                    $payment->Customer_payment_id = $customer_id;
                    $payment->payment_id = $paymentIntent->id;
                    $payment->amount = $paymentIntent->amount;
                    $payment->status = true;
                    $payment->save();
                    ////////////// Payment data ///////////////////////

                    $maildata = [        // admin mail data
                        'title' => 'New Booking',
                        'guest_name' => $request->guestName,
                        'guest_email' => $request->email,
                        'guest_number' => $request->contact_number,
                        'booking_number' => $BookingNumber,
                        'villa_name' => $villa->villa_name,
                        'checkin_date' => $booking->checkin_date,
                        'checkout_date' => $booking->checkout_date,
                        'total_amount' => $booking->Total_price
                    ];
                    $admin = User::where('role', 'admin')->first();
                    Mail::to($admin->email)->send(new bookingmail($maildata));

                    $userdata = [        // user mail data
                        'guest_name' => $request->guestName,
                        'guest_email' => $request->email,
                        'guest_number' => $request->contact_number,
                        'booking_number' => $BookingNumber,
                        'villa_name' => $villa->villa_name,
                        'checkin_date' => $booking->checkin_date,
                        'checkout_date' => $booking->checkout_date,
                        'total_amount' => $booking->Total_price,
                        'description' => 'your booking is done'
                    ];
                    Mail::to($request->email)->send(new UserNotifymail($userdata));

                    return redirect('/booking-details');
                } else {
                    return redirect()->back()->with('msg', 'fail');
                }
            } else {
                $booking->Total_price = $paymentIntent->amount;
                $booking->payment_id = $paymentIntent->id;
                $booking->booking_status = "pending";
                $booking->save();
                if ($booking) {
                    $payment = new Payment();
                    $payment->user_id = $billing_id;
                    $payment->booking_number = $booking->booking_number;
                    $payment->Customer_payment_id = $customer_id;
                    $payment->payment_id = $paymentIntent->id;
                    $payment->amount = $paymentIntent->amount;
                    $payment->status = false;
                    $payment->save();
                    return redirect()->back()->with('msg', 'fail');
                } else {
                    return redirect()->back()->with('msg', 'fail');
                }
            }

        } catch (\Stripe\Exception\CardException $e) {
            $error = $e->getError();
            $errorMessage = $error->message;
            return view('travelista.booking_villa.booking', ['errorMessage' => $errorMessage]);
        }
    }

    public function bookingdetails(Request $request)
    {
        if(Auth::user()) {
            $booked_villa = BookedVilla::where('billing_details_id',Auth::user()->details->id)->get();
            $bookings = BookedVilla::where('billing_details_id',Auth::user()->details->id)->get(['checkin_date', 'checkout_date']);
        } else {
             $user = BillingDetails::where('email',$request->email)->first();
             if($user) {
                $booked_villa = BookedVilla::where('billing_details_id',$user->id)->get();
                $bookings = BookedVilla::where('billing_details_id',$user->id)->get(['checkin_date', 'checkout_date']);
             }else{
                $booked_villa = '';
                $bookings = '';
             }
        }
        return view('travelista.booking_villa.booking',compact('booked_villa','bookings'));
    }
}
