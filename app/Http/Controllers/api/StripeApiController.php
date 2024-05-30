<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentIntent;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class StripeApiController extends Controller
{
    
public function stripePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create a Customer
            $customer = Customer::create([
                'email' => $request->email,
            ]);

            $amount = $request->amount;
            $totalAmount = $amount + ($amount * 0.15);

            // Create a PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmount * 100, // Amount in cents
                'currency' => 'SAR',
                'payment_method_types' =>'card',
                // 'customer' => $customer->id,
            ]);

            // Check the status of the PaymentIntent
            // This would usually be handled in the frontend when confirming the payment

            $vat = '15';
            $email = $request->email;
            $location_from = $request->locationFrom;
            $location_to = $request->locationTo;
            $trip_cat = $request->tripCategory;
            $trip_date = $request->tripDate;
            $trip_time = $request->tripTime;
            $trip_type = $request->tripType;

            Mail::to($email)->send(new WelcomeMail($amount, $location_from, $location_to, $trip_cat, $trip_date, $trip_time, $trip_type, $vat, $totalAmount));

            return response()->json([
                'msg' => 'Payment Successful. Thank you.',
                'clientSecret' => $paymentIntent->client_secret,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

}
