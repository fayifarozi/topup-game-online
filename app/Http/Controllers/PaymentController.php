<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\Midtrans\Midtrans;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    /**
     * Receive notification from payment gateway
     *
     * @param Request $request payment data
     *
     * @return json
     */
    public function notification(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $payload = $request->getContent();
        $notification = json_decode($payload);
        $validSignatureKey = hash("sha512",$notification->order_id . $notification->status_code . $notification->gross_amount . $serverKey);
        
        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }
        
        $this->initPaymentGateway();
        $paymentNotification = new \Midtrans\Notification();
        $order = Order::where('order_code', $paymentNotification->order_id)->firstOrFail();
        
        if ($order->isPaid()) {
            return response(['message' => 'The order has been paid before'], 422);
        }
        $transaction = $paymentNotification->transaction_status;
        $type = $paymentNotification->payment_type;
        $fraud = $paymentNotification->fraud_status;

        $vaNumber = null;
        $vendorName = null;
        if (!empty($paymentNotification->va_numbers[0])) {
            $vaNumber = $paymentNotification->va_numbers[0]->va_number;
            $vendorName = $paymentNotification->va_numbers[0]->bank;
        }

        $paymentStatus = null;
        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    $paymentStatus = Payment::CHALLENGE;
                }else if($fraud == 'accept'){
                    // TODO set payment status in merchant's database to 'Success'
                    $paymentStatus = Payment::SUCCESS;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $paymentStatus = Payment::SETTLEMENT;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $paymentStatus = Payment::PENDING;
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $paymentStatus = PAYMENT::DENY;
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $paymentStatus = PAYMENT::EXPIRE;
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $paymentStatus = PAYMENT::CANCEL;
        }

        $paymentParams = [
            'order_id' => $order->order_code,
            'number' => Payment::generateCode(),
            'amount' => $paymentNotification->gross_amount,
            'method' => 'midtrans',
            'status' => $paymentStatus,
            'token' => $paymentNotification->transaction_id,
            'payloads' => $payload,
            'payment_type' => $paymentNotification->payment_type,
            'va_number' => $vaNumber,
            'vendor_name' => $vendorName,
            'biller_code' => $paymentNotification->biller_code,
            'bill_key' => $paymentNotification->bill_key,
        ];
        $payment = Payment::create($paymentParams);
        if ($paymentStatus && $payment) {
            if (in_array($payment->status, [Payment::SUCCESS, Payment::SETTLEMENT])) {
                $order->metode = $type;
                $order->status = Order::COMPLETED;
                $order->payment_status = Order::PAID;
                $order->save();
            }
            if (in_array($payment->status, [Payment::DENY, Payment::EXPIRE])){
                $order->metode = $type;
                $order->status = Order::CANCELLED;
                $order->save();
            }
        }

        $message = 'Payment status is : '. $paymentStatus;

        $response = [
            'code' => 200,
            'message' => $message,
        ];

        return response($response, 200);
    }

    /**
     * Show completed payment status
     *
     * @param Request $request payment data
     *
     * @return void
     */
    public function finish(Request $request)
    {
        $code = $request->query('order_code');
        $order = Order::where('order_code', $code)->firstOrFail();
        
        if ($order->payment_status == Order::UNPAID) {
            return redirect()->route('checkDetail', $order->_id)->with('error',"Sorry, status payment doesn't change.");
        }

        return redirect()->route('checkDetail', $order->_id)->with('success', "Thank you for completing the payment process!");
    }

    /**
     * Show unfinish payment page
     *
     * @param Request $request payment data
     *
     * @return void
     */
    public function unfinish(Request $request)
    {

        $code = $request->query('id');
        $order = Order::where('order_code', $code)->firstOrFail();

        return redirect()->route('checkDetail', $order->_id)->with('error', "Sorry, we couldn't process your payment.");
    }

    /**
     * Show failed payment page
     *
     * @param Request $request payment data
     *
     * @return void
     */
    public function failed(Request $request)
    {
        $code = $request->query('order_id');
        $order = Order::where('order_code', $code)->firstOrFail();

        return redirect()->route('checkDetail', $order->_id)->with('error',"Sorry, we couldn't process your payment.");
    }
}
