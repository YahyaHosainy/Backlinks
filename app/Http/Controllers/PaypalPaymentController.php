<?php

namespace App\Http\Controllers;

use App\Mail\AdminMailFundsAddedByUser;
use App\Mail\FundsAdded;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Omnipay\Common\GatewayInterface;
use Omnipay\Omnipay;
use App\Models\Payment;


/**
 * Class PaymentController
 * @package App\Http\Controllers
 */
class PaypalPaymentController extends Controller
{
    use SEOToolsTrait;

    /**
     * @var GatewayInterface
     */
    public $gateway;

    /**
     * PaymentController constructor.
     */
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false); //set it to 'false' when go live
    }


    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('payment.payment');
    }

    /**
     * @param Request $request
     * @return string|null
     */
    public function charge(Request $request)
    {
        // Validate the received data
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        if($request->input('submit'))
        {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('paymentsuccess'),
                    'cancelUrl' => url('paymenterror'),
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * If the payment is done correctly
     *
     * @param Request $request
     * @return RedirectResponse|string|null
     */
    public function payment_success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();

                // Get the current user
                $user = auth()->user();

                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = env('PAYPAL_CURRENCY');
                    $payment->payment_status = $arr_body['state'];
                    $payment->payment_method = "Paypal";
                    $payment->paypal_email = $arr_body['payer']['payer_info']['email'];
                    $payment->user_id = auth()->user()->id;
                    $payment->save();

                    // Add the added amount to the authenticated user's balance
                    $user->balance = $user->balance + $payment->amount;

                    // Check if the user is eligible for bonus or not
                    if ($payment->amount >= env('BONUS_FUNDS_VALUE')) {
                        $user->balance = $user->balance + env('BONUS_FUNDS_GREATER_THAN_ONE_HUNDRED');
                    }

                    // Save user changes
                    $user->save();

                    // Send Email notification to the user
                    Mail::to($user->email)->send( new FundsAdded($payment));

                    // Send email notification to the admin
                    $adminEmail = env('ADMIN_EMAIL');
                    Mail::to($adminEmail)->send(new AdminMailFundsAddedByUser($payment));
                }

                session()->flash('payment-done', 'Funds are added successfully !');

                //redirect to thanks page
                return redirect()->route('thanks_page');
            } else {
                return $response->getMessage();
            }
        } else {
            session()->flash('payment-declined', 'Transaction is declined !');
            return redirect()->route('add-funds');
        }
    }

    /**
     * Return back if there is a payment error
     *
     * @return RedirectResponse
     */
    public function payment_error()
    {
        session()->flash('payment-canceled', 'User canceled the payment.');
        return redirect()->route('add-funds');
    }

    /**
     * @TODO
     */
    public function getReportsIds()
    {}
}
