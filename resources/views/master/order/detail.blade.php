@extends('master.layouts.index')

@section('title','CakStore | Admin')

@section('content')
    <section class="checkout mx-auto">
        <div class="container-fluid">
            <div class="title-text pt-md-50 pt-10">
                <h2 class="text-4xl fw-bold color-palette-1 mb-10">Checkout</h2>
            </div>
            <hr>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success')}}
                    </div>
                @endif
            <div class="purchase pt-md-50 pt-20">
                <h2 class="fw-bold text-xl color-palette-1 mb-20">Purchase Details</h2>
                <p class="text-lg color-palette-1 mb-20">Your Game ID <span class="purchase-details">{{ $detail->user_info }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Order ID <span class="purchase-details">#{{ $detail->order_code }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Game <span class="purchase-details">{{ $detail->product->game??NULL }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Item <span class="purchase-details">{{ $detail->product->item??NULL }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Price <span class="purchase-details">{{ $detail->product->price??NULL }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Status <span class="purchase-details">{{ $detail->status }}</span></p>
            </div>
            <div class="payment pt-md-50 pb-md-50 pt-10 pb-10">
                <h2 class="fw-bold text-xl color-palette-1 mb-20">Payment Informations</h2>
                <p class="text-lg color-palette-1 mb-20">Method <span class="payment-details">{{ $detail->metode }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Phone <span class="purchase-details">{{ $detail->phone }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Status <span class="payment-details">{{ $detail->payment_status ?? NULL }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Token <span class="payment-details">{{ $detail->payment_token ?? NULL }}</span></p>
            </div>
            <div class="d-flex justify-content-evenly">
                <a href="/master/order" class="btn btn-confirm-payment fw-medium text-white text-lg mx-2"> Back </a>
            </div>
    </section>
@endsection()