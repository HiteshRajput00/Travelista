<?php

namespace App\Http\Controllers\travelista;

use App\Http\Controllers\Controller;
use App\Models\BillingDetails;
use App\Models\BookedVilla;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // dd($request->all());
        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
            } else {
                $new_user = new User();
                $new_user->name = $request->guestName;
                $new_user->email = $request->email;
                $new_user->mobile_number = $request->contact_number;
                $new_user->password = $request->email;
                $new_user->on_booking = true;
                $new_user->save();
                // Auth::login($new_user);
                $user = $new_user;
            }

            $billing_address = BillingDetails::where('user_id', $user->id)->first();
            if ($billing_address) {
                $billing_address->update([
                    'name' => $request->guestName,
                    'email' => $request->email,
                    'Contact_number' => $request->contact_number,
                    'house_number' => $request->house_number,
                    'City' => $request->City,
                    'State' => $request->State,
                    'Country' => $request->Country,
                ]);
                $billing_id = $billing_address->id;
            } else {
                $new_billing = new BillingDetails();
                $new_billing->name = $request->guestName;
                $new_billing->email = $request->email;
                $new_billing->Contact_number = $request->contact_number;
                $new_billing->house_number = $request->house_number;
                $new_billing->City = $request->City;
                $new_billing->State = $request->State;
                $new_billing->Country = $request->Country;
                $new_billing->save();
                $billing_id = $new_billing->id;
            }
            $BookingNumber = 'BN_' . str::random(8);
            $booking = new BookedVilla();
            $booking->booking_number = $BookingNumber;
            $booking->villa_id = $request->villa_id;
            $booking->billing_details_id = $billing_id;
            $booking->checkin_date = $request->checkin_date;
            $booking->checkout_date = $request->checkout_date;
            $booking->number_guests = $request->numOfGuests;

            // stripe key //
            $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));

            // stripe customer //
            if($user->stripe_customer)
            $customer = Customer::create([
                'name' => $request->guestName,
                'email' => $request->email,
                'phone' => $request->contact_number,
                'address' => [
                    'line1' => $request->house_number,
                    'city' => $request->City,
                    'state' => $request->State,
                    'country' => $request->Country,
                ],
            ]);
            $paymentMethodId = $request->token;

            $paymentIntent = PaymentIntent::create([
                'amount' => (int) $request->total_price * 100,
                'currency' => 'inr',
                'customer' => $customer->id,
                'payment_method' => $paymentMethodId,
                'metadata' => ['booking_id' => $BookingNumber],
                'confirm' => true,
                'off_session' => true,
            ]);

            $clientsecret = $paymentIntent->client_secret;
            if ($paymentIntent->status === 'succeeded') {

                $booking->Total_price = $paymentIntent->amount;
                $booking->payment_id = $paymentIntent->id;
                $booking->booking_status = "confirmed";
                $booking->save();
                if ($booking) {
                    $payment = new Payment();
                    $payment->user_id = $billing_id;
                    $payment->booking_number = $booking->booking_number;
                    $payment->Customer_payment_id = $customer->id;
                    $payment->payment_id = $paymentIntent->id;
                    $payment->amount = $paymentIntent->amount;
                    $payment->status = true;
                    $payment->save();
                    ////////////// Payment data ///////////////////////

                    return redirect()->back()->with('msg', 'done');
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
                    $payment->Customer_payment_id = $customer->id;
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

    // public function bookvilla(Request $request)
    // {
    //     dd($request->all());
    //     $request->validate(['email'=>'required|email']);
    //     // dd($request->all());
    //     if (Auth::user()) {
    //         $user = User::find($request->user_id);
    //     } else {
    //         $request->validate(['email'=>'required|email|unique:users']);
    //         $user = new User();
    //         $user->name = $request->guestName;
    //         $user->email = $request->email;
    //         $user->mobile_number = $request->contactInfo;
    //         $user->password = $request->email;
    //         $user->save();

    //         Auth::login($user);
    //     }
    //     $formattedCheckinDate = date('Y-m-d', strtotime($request->checkin_date));
    //     $formattedCheckoutDate = date('Y-m-d', strtotime($request->checkout_date));
    //     $user_details = BillingDetails::where('user_id', $user->id)->first();
    //     if ($user_details) {
    //         $user_details->updated([
    //             'name' => $request->guestName,
    //             'email' => $request->email,
    //             'Contact_number' => $request->contactInfo,
    //         ]);
    //         // $id = $user_details->id;
    //     } else {
    //         $user_details = new BillingDetails();
    //         $user_details->user_id = $user->id;
    //         $user_details->name = $request->guestName;
    //         $user_details->email = $request->email;
    //         $user_details->Contact_number = $request->contactInfo;
    //         $user_details->city = $request->city;
    //         $user_details->state = $request->state;
    //         $user_details->country = $request->country;
    //         $user_details->save();
    //     }
    //     $BookingNumber = 'B_N_' . str::random(8);
    //     $book = new BookedVilla();
    //     $book->booking_number = $BookingNumber;
    //     $book->villa_id = $request->villa_id;
    //     if ($user_details) {
    //         // $book->billing_details_id = $id;
    //     } else {
    //         $book->billing_details_id = $user_details->id;
    //     }
    //     $book->checkin_date = $formattedCheckinDate;
    //     $book->checkout_date = $formattedCheckoutDate;
    //     $book->number_guests = $request->numOfGuests;

    //     // Stripe payment //
    //     try {
    //         // $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));
    //         $stripeCustomer = $stripe->customers->create([
    //             'name' => $request->guestName,
    //             'email' => $request->email,
    //             'address' => [
    //                 'line1' => '510 d',
    //                 'postal_code' => 1234325,
    //                 'city' => $request->city,
    //                 'state' => $request->state,
    //                 'country' => 'us',
    //             ],
    //             'payment_method' => $request->token,
    //         ]);
    //         $paymentMethodId = $request->token;

    //         $paymentIntentObject = $stripe->paymentIntents->create([
    //             'amount' => (int) $request->total_price * 10,
    //             'currency' => 'inr',
    //             'customer' => $stripeCustomer->id,
    //             'payment_method_types' => ['card'],
    //             'payment_method' => $paymentMethodId,
    //             'metadata' => ['booking_id' => $BookingNumber],
    //             'capture_method' => 'automatic',
    //             'confirm' => true,
    //             'off_session' => true,
    //             'description' => 'booking done',
    //         ]);

    //         ///////////////// checking payment status //////////////////
    //         $clientsecret = $paymentIntentObject->client_secret;
    //         if ($paymentIntentObject->status === 'succeeded') {

    //             $book->Total_price = $paymentIntentObject->amount;
    //             $book->payment_id = $paymentIntentObject->id;
    //             $book->booking_status = "confirmed";
    //             $book->save();

    //             $payment = new Payment();
    //             $payment->user_id = $user_details->id;
    //             $payment->booking_number = $book->booking_number;
    //             $payment->Customer_payment_id = $stripeCustomer->id;
    //             $payment->payment_id = $paymentIntentObject->id;
    //             $payment->amount = $paymentIntentObject->amount;
    //             $payment->status = true;
    //             $payment->save();
    //             ////////////// Payment data ///////////////////////

    //             return redirect()->back()->with('msg', 'done');
    //         } else {
    //             $book->Total_price = $paymentIntentObject->amount;
    //             $book->payment_id = $paymentIntentObject->id;
    //             $book->booking_status = "pending";
    //             $book->save();

    //             $payment = new Payment();
    //             $payment->user_id = $user_details->id;
    //             $payment->booking_number = $book->booking_number;
    //             $payment->Customer_payment_id = $stripeCustomer->id;
    //             $payment->payment_id = $paymentIntentObject->id;
    //             $payment->amount = $paymentIntentObject->amount;
    //             $payment->status = false;
    //             $payment->save();
    //             return redirect()->back()->with('msg','fail');
    //         }

    //     } catch (\Stripe\Exception\CardException $e) {
    //         $error = $e->getError();
    //         $errorMessage = $error->message;
    //         return view('travelista.booking_villa.booking', ['errorMessage' => $errorMessage]);
    //     }
    // }
}
