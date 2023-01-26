@extends('layouts.main')

@section('title','CakStore | Checkout')

@section('content')
    <section class="checkout mx-auto pb-md-145 pt-30 pb-30">
        <div class="container pt-15 pb-15" style="min-height: 50vh;">
            <div class="title-text pt-md-50 pt-0">
                <h2 class="text-4xl fw-bold color-palette-1 mb-10">Search</h2>
            </div>
            <div class="input-group mt-5 mb-3">
                <form action="/checkout-search">
                    <input type="text" class="form-control" style="width: 70%;" placeholder="Masukkan ID Order" aria-label="S" name= "search" aria-describedby="button-addon2">
                    <button class="btn btn-confirm-payment fw-medium text-lg" type="button" id="button-addon2">Search Order</button>
                </form>
            </div>
        </div>
    </section>
@endsection()