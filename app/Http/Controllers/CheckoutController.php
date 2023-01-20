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

    public function mlbb(){
        $product = Product::where('game', 'Mobile Legends')->orderBy('price', 'asc')->get();
        return view('/game-form/form',[
            'product'=> $product,
            'title' => "Valorant",
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequatur sunt provident repellat expedita doloremque nostrum
            quidem ullam laboriosam corrupti laudantium corporis ipsam,
            tenetur optio consectetur iure! Ipsam voluptatum nisi soluta.",
            'image' => "MLBB.jpg",
            'denomImg' => "MLBB/Diamonds_item.png" 
        ]);
    }

    public function valorant(){
        $product = Product::where('game', 'Valorant')->orderBy('price', 'asc')->get();
        return view('/game-form/form',[
            'product'=> $product,
            'title' => "Valorant",
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequatur sunt provident repellat expedita doloremque nostrum
            quidem ullam laboriosam corrupti laudantium corporis ipsam,
            tenetur optio consectetur iure! Ipsam voluptatum nisi soluta.",
            'image' => "VALORANT.jpg",
            'denomImg' => "VALORANT/VALORANT_Points.png" 
        ]);
    }

    public function genshin(){
        $product = Product::where('game', 'Genshin Impact')->orderBy('price', 'asc')->get();
        return view('/game-form/form',[
            'product'=> $product,
            'title' => "Genshin Impact",
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequatur sunt provident repellat expedita doloremque nostrum
            quidem ullam laboriosam corrupti laudantium corporis ipsam,
            tenetur optio consectetur iure! Ipsam voluptatum nisi soluta.",
            'image' => "GENSHIN.png",
            'denomImg' => "GENSHIN/Genshin_Crystals.png" 
        ]);
    }

    public function freefire(){
        $product = Product::where('game', 'Free Fire')->orderBy('price', 'asc')->get();
        return view('/game-form/form',[
            'product'=> $product,
            'title' => "Free Fire",
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequatur sunt provident repellat expedita doloremque nostrum
            quidem ullam laboriosam corrupti laudantium corporis ipsam,
            tenetur optio consectetur iure! Ipsam voluptatum nisi soluta.",
            'image' => "FREEFIRE.jpg",
            'denomImg' => "FREE-FIRE/Freefire_diamonds.png" 
        ]);
    }

    public function pubg(){
        $product = Product::where('game', 'PUBG')->orderBy('price', 'asc')->get();
        return view('/game-form/form',[
            'product'=> $product,
            'title' => "PUBG Mobile",
            'deskripsi' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Consequatur sunt provident repellat expedita doloremque nostrum
            quidem ullam laboriosam corrupti laudantium corporis ipsam,
            tenetur optio consectetur iure! Ipsam voluptatum nisi soluta.",
            'image' => "PUBG.png",
            'denomImg' => "VALORANT/VALORANT_Points.png" 
        ]);
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
        
        // $validatedData = $request->validate($rules);
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
        return view('/checkout-detail',[
            'detail' => $order
        ]);
    }
}
