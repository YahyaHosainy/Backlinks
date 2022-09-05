<?php

namespace App\Http\Controllers;

use App\Mail\AdminMailFundsAddedByUser;
use App\Mail\FundsAdded;
use App\Models\Payment;
use http\Client\Response;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Omnipay\Omnipay;

/**
 * Class StripePaymentController
 * @package App\Http\Controllers
 */
class StripePaymentController extends Controller
{
    /**
     * Charge the user
     *
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Http\Response
     */
    public function charge(Request $request)
    {
        // Validating the form request
        $request->validate([
            'stripe-amount' => 'required|numeric'
        ]);

        // Check the availability of Stripe Token
        if ($request->input('stripeToken')) {

            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey(env('STRIPE_SECRET_KEY'));

            $token = $request->input('stripeToken');

            $response = $gateway->purchase([
                'amount' => $request->input('stripe-amount'),
                'currency' => env('STRIPE_CURRENCY'),
                'token' => $token,
            ])->send();

            $user = auth()->user();

            if ($response->isSuccessful()) {
                // payment was successful: insert transaction data into the database
                $arr_payment_data = $response->getData();
                $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = env('STRIPE_CURRENCY');
                    $payment->payment_status = $arr_payment_data['status'];
                    $payment->payment_method = 'stripe';
                    $payment->receipt_url = $arr_payment_data['receipt_url'];
                    $payment->user_id = auth()->user()->id;
                    $payment->card_type = $arr_payment_data['payment_method_details']['card']['brand'];
                    $payment->last4 = $arr_payment_data['payment_method_details']['card']['last4'];
                    $payment->save();

                    // Add the added amount to the authenticated user's balance
                    $user->balance = $user->balance + $payment->amount;

                    // Send Email notification to the user
                    Mail::to($user->email)->send( new FundsAdded($payment));

                    // Send email notification to the admin
                    $adminEmail = env('ADMIN_EMAIL');
                    Mail::to($adminEmail)->send(new AdminMailFundsAddedByUser($payment));
                }

                session()->flash('payment-done', 'Funds are added successfully !');

                // Check if the user is eligible for the funds bonus
                if ($payment->amount >= env('BONUS_FUNDS_VALUE')) {
                    $user->balance  = $user->balance + env('BONUS_FUNDS_GREATER_THAN_ONE_HUNDRED');
                }

                // Save user changes
                $user->save();

                //redirect to thanks page
                return redirect()->route('thanks_page');
            } else {
                // payment failed: display message to customer
                session()->flash('payment-failed', 'Payment Failed !');
                return redirect()->route('add-funds');
            }
        } else {
            return response(['error'=>true,'error-msg'=> 'Please fill the form correctly !'],404);
        }
    }

    /**
     * Download an invoice for a payment
     *
     * @param $id
     * @return Factory|View
     */
    public function invoice($id)
    {
        // Find the payment with the given ID
        $payment = Payment::find($id);

        // Generate a new PDF based on DOM
        $pdf = \App::make('dompdf.wrapper');

        // Load the invoice template to use
        $pdf->loadView('payment.invoice', [
            'payment' => $payment
        ]);

        // Download the invoice after clicking on download button
        return $pdf->download('invoice.pdf');
    }
}
