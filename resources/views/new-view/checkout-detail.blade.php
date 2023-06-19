@extends('layouts.page')

@section('title','CakStore | Checkout')

@section('content')
    <section class="checkout mx-auto pb-md-145 pt-30 pb-30">
        <div class="container pt-15 pb-15">
            <div class="title-text pt-md-50 pt-0">
                <h2 class="text-4xl fw-bold color-palette-1 mb-10">Checkout</h2>
                <p class="text-lg color-palette-1 mb-0">Waktunya meningkatkan cara bermain</p>
            </div>
            <hr>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-success" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            <div class="purchase pt-md-50 pt-30">
                <h2 class="fw-bold text-xl color-palette-1 mb-20">Purchase Details</h2>
                <p class="text-lg color-palette-1 mb-20">Your Game ID <span class="purchase-details">{{ $detail->user_game_id }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Order ID <span class="purchase-details">#{{ $detail->order_code }}</span></p>
                <p class="text-lg color-palette-1 mb-20">Game <span class="purchase-details">{{ $detail->product->game ?? 'NULL'}}</span></p>
                <p class="text-lg color-palette-1 mb-20">Item <span class="purchase-details">{{ $detail->product->item ?? 'NULL' }} Diamond</span></p>
                <p class="text-lg color-palette-1 mb-20">Total <span class="purchase-details"> Rp.{{ $detail->total_price }}</span></p>
            </div>
            <div class="payment pt-md-50 pb-md-50 pt-10 pb-10">
                <h2 class="fw-bold text-xl color-palette-1 mb-20">Payment Informations</h2>
                <p class="text-lg color-palette-1 mb-20">Payment <span class="payment-details">{{ $detail->metode }}</span>
                <p class="text-lg color-palette-1 mb-20">Status <span class="purchase-details">{{ $detail->status }}</span></p>
            </div>
            <div class="d-flex justify-content-evenly">
                <a href="/" class="btn btn-confirm-payment fw-medium text-white text-lg mx-2">Back</a>
                @if($detail->payment_status != "paid")
                <button id="pay-button" class="btn btn-confirm-payment text-white text-lg mx-2 ">Proceed to Payment</button>
                @endif
            </div>
        </div>
    </section>

    
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            snap.pay('{{ $detail->payment_token }}',{
                // Optional
                onSuccess: function(result){
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result);
                    location.href='/checkout-detail/{{ $detail->_id }}';
                },
                // Optional
                onPending: function(result){
                    console.log(result);
                    location.href='/checkout-detail/{{ $detail->_id }}';
                },
                // Optional
                onError: function(result){
                    console.log(result);
                    location.href='/checkout-detail/{{ $detail->_id }}';
                }
        });
        });
    </script>
@endsection()