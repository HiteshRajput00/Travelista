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

class BookingController extends Controller
{
    public function bookvilla(Request $request)
    {
        dd($request->all());
        $request->validate(['email'=>'required|email']);
        // dd($request->all());
        if (Auth::user()) {
            $user = User::find($request->user_id);
        } else {
            $request->validate(['email'=>'required|email|unique:users']);
            $user = new User();
            $user->name = $request->guestName;
            $user->email = $request->email;
            $user->mobile_number = $request->contactInfo;
            $user->password = $request->email;
            $user->save();

            Auth::login($user);
        }
        $formattedCheckinDate = date('Y-m-d', strtotime($request->checkin_date));
        $formattedCheckoutDate = date('Y-m-d', strtotime($request->checkout_date));
        $user_find = BillingDetails::where('user_id', $user->id)->first();
        if ($user_find) {
            $id = $user_find->id;
        } else {
            $user_details = new BillingDetails();
            $user_details->user_id = $user->id;
            $user_details->name = $request->guestName;
            $user_details->email = $request->email;
            $user_details->Contact_number = $request->contactInfo;
            $user_details->city = $request->city;
            $user_details->state = $request->state;
            $user_details->country = $request->country;
            $user_details->save();
        }
        $BookingNumber = 'B_N_' . str::random(8);
        $book = new BookedVilla();
        $book->booking_number = $BookingNumber;
        $book->villa_id = $request->villa_id;
        if ($user_find) {
            $book->billing_details_id = $id;
        } else {
            $book->billing_details_id = $user_details->id;
        }
        $book->checkin_date = $formattedCheckinDate;
        $book->checkout_date = $formattedCheckoutDate;
        $book->number_guests = $request->numOfGuests;

        // Stripe payment //
        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $stripeCustomer = $stripe->customers->create([
                'name' => $request->guestName,
                'email' => $request->email,
                'address' => [
                    'line1' => '510 d',
                    'postal_code' => 1234325,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => 'us',
                ],
                'payment_method' => $request->token,
            ]);
            $paymentMethodId = $request->token;

            $paymentIntentObject = $stripe->paymentIntents->create([
                'amount' => (int) $request->total_price * 10,
                'currency' => 'usd',
                'customer' => $stripeCustomer->id,
                'payment_method_types' => ['card'],
                'payment_method' => $paymentMethodId,
                'metadata' => ['booking_id' => $BookingNumber],
                'capture_method' => 'automatic',
                'confirm' => true,
                'off_session' => true,
                'description' => 'booking done',
            ]);

            ///////////////// checking payment status //////////////////
            $clientsecret = $paymentIntentObject->client_secret;
            if ($paymentIntentObject->status === 'succeeded') {

                $book->Total_price = $paymentIntentObject->amount;
                $book->payment_id = $paymentIntentObject->id;
                $book->booking_status = "confirmed";
                $book->save();

                $payment = new Payment();
                $payment->user_id = $user_details->id;
                $payment->booking_number = $book->booking_number;
                $payment->Customer_payment_id = $stripeCustomer->id;
                $payment->payment_id = $paymentIntentObject->id;
                $payment->amount = $paymentIntentObject->amount;
                $payment->status = true;
                $payment->save();
                ////////////// Payment data ///////////////////////

                return redirect()->back()->with('msg', 'done');
            } else {
                $book->Total_price = $paymentIntentObject->amount;
                $book->payment_id = $paymentIntentObject->id;
                $book->booking_status = "pending";
                $book->save();

                $payment = new Payment();
                $payment->user_id = $user_details->id;
                $payment->booking_number = $book->booking_number;
                $payment->Customer_payment_id = $stripeCustomer->id;
                $payment->payment_id = $paymentIntentObject->id;
                $payment->amount = $paymentIntentObject->amount;
                $payment->status = false;
                $payment->save();
                return redirect()->back()->with('msg','fail');
            }

        } catch (\Stripe\Exception\CardException $e) {
            $error = $e->getError();
            $errorMessage = $error->message;
            return view('travelista.booking_villa.booking', ['errorMessage' => $errorMessage]);
        }
    }
}
