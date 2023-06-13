<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::with('product')->latest();

        if(request('search')){
            $data->where('order_code','like','%'.request('search').'%')
            ->orWhere('user_game_id','like','%'.request('search').'%')
            ->orWhere('email','like','%'.request('search').'%')
            ->orWhere('phone','like','%'.request('search').'%')
            ->orWhere('product.game','like','%'.request('search').'%');
        }

        return view('new-admin.order.order-list',[
            'data' => $data->paginate(5)
        ]);
    }

    public function notifpayment(){
        $data = Payment::latest();

        if(request('search')){
            $data->where('order_code','like','%'.request('search').'%');
        }

        return view('new-admin.order.payment-list',[
            'data' => $data->paginate(5)
        ]);
    }
    
    public function create()
    {
        $product = Product::all();
        return view('new-admin.order.create',[
            'product' => $product
        ]);
    }

    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'user_info' => 'required|max:255',
            'kode_id' => 'required|max:255',
            'phone' => 'required',
            'metode' => 'required',
        ]);
        $product = Product::findOrDie('kode_id','=',request('kode_id'));
        $validatedData['total_price'] = $product->price; 
        $validatedData['order_code'] = Order::generateCode();
        $validatedData['status'] = 'Proses';
        // dd($validatedData);
        $order = Order::create($validatedData);

        self::_generatePaymentToken($order);
        return $order;

		if ($order) {
			Session::flash('success', 'Thank you. Your order has been received!');
			return redirect('orders/received/'. $order->id);
		}

		return redirect('orders/checkout');
        
        Order::create($validatedData);

        return redirect('/master/order')->with('success','New Order has been added!');
    }

    private function _generatePaymentToken($order)
	{
		$customerDetails = [
            'user_game_id' => $order->user_game_id,
			'phone' => $order->phone,
		];

		$params = [
            'enable_payments' => \App\Models\Payment::PAYMENT_CHANNELS,
			'transaction_details' => [
                'order_id' => $order->order_code,
				'gross_amount' => $order->total_price,
			],            
            
			'customer_details' => $customerDetails,
			'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
				'unit' => \App\Models\Payment::EXPIRY_UNIT,
				'duration' => \App\Models\Payment::EXPIRY_DURATION,
			],
		];
        
		$snap = \Midtrans\Snap::createTransaction($params);
		if ($snap->token) {
            $order->payment_token = $snap->token;
			$order->payment_url = $snap->redirect_url;
			$order->save();
		}
	}

    public function detail(Order $order)
    {
        return view('new-admin.order.detail',[
            'detail' => $order,
            'product' => $order->product()
        ]);
    }

    public function edit(Order $order)
    {
        $product = Product::all();
        return view('new-admin.order.update',[
            'order' => $order,
            'product' => $product
        ]);
    }

    public function update(Request $request, Order $order)
    {   
        $rules = [
            'user_info' => 'required|max:255',
            'kode_id' => 'required|max:255',
            'metode' => 'required|max:255',
            'phone' => 'required'
        ];

        if($request->status != $order->status){
            $rules['status'] = 'required';
        }

        $validatedData = $request->validate($rules);

        Order::where('_id',$order->_id)
            ->update($validatedData);

        return redirect('/master/order')->with('success','Update order status success!');
    }

    public function destroy(Order $order)
    {
        Order::destroy($order->_id);
        return redirect('/master/order')->with('success','Order has been deleted!');
    }


}
