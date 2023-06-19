<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Auth\Events\Validated;

class CheckoutController extends Controller
{   
    public function index(){
        if(request('search')){
            $data = Order::with('product');
            // dd($data);
            $data->where('order_code','like','%'.request('search').'%')
            ->orWhere('user_game_id','like','%'.request('search').'%')
            ->orWhere('email','like','%'.request('search').'%');

            $find = $data->first();
            // dd($find);
            return redirect()->route('checkDetail', ['order' => $find->_id]);
        }
        return view('new-view.checkout-search');
    }

    public function checkout(Request $request)
    {   
        $validatedData = $request->validate( [
            'user_game_id' => 'required|max:255',
            'kode_id' => 'required|max:255',
            'phone' => 'required',
            'total_price' => 'required'
        ]);
        
        if(!empty($request->email)){
            $validatedData['email'] = request('email');
        }
        
        $order_code = Order::generateCode();
        $validatedData['metode'] = null;
        $validatedData['status'] = Order::PROCESS;
        $validatedData['order_code'] = $order_code;
        
        $order = Order::create($validatedData);
        if(($order != null)){
            self::_generatePaymentToken($order);

            return redirect()->route('checkDetail', $order->_id)->with('success', 'Thank you. Your order has been received!');
		}
    }
    
    public function _generatePaymentToken($order)
	{
        $this->initPaymentGateway();
		$customerDetails = [
            'first_name' => $order->user_game_id,
            'email' => $order->email,
			'phone' => $order->phone,
		];

		$params = [
            'enable_payments' => Payment::PAYMENT_CHANNELS,
			'transaction_details' => [
                'order_id' => $order->order_code,
				'gross_amount' => $order->total_price,
            ],
            'item_details' => [
                [
                    'id' => $order->kode_id,
                    'price' => $order->product->price,
                    'quantity' => 1,
                    'name' => $order->product->game.' - '.$order->product->item,
                ],
            ],
			'customer_details' => $customerDetails,
			'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
				'unit' => Payment::EXPIRY_UNIT,
				'duration' => Payment::EXPIRY_DURATION,
			],
		];
        
		$snapToken = \Midtrans\Snap::getSnapToken($params);
        
        if($snapToken != null){
            $order->payment_token = $snapToken;
            $order->payment_status = Order::UNPAID;
            $order->push();
        }
	}

    public function checkoutDetails(Order $order){
        return view('new-view.checkout-detail',[
            'detail' => $order
        ]);
    }
}
