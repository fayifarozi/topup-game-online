@extends('layouts.page')

@section('title','CakStore | Checkout Search')

@section('content')
    <section class="checkout mx-auto pb-md-145 pt-30 pb-30">
        <div class="container mt-3">
            <div class="row">
                <div class="card border-0 " style="min-height: 50vh;">
                    <div class="col-12">
                        <div class="title-text">
                            <h2 class="text-4xl fw-bold color-palette-1 mb-10">Search</h2>
                        </div>
                        <form action="/checkout-search">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name= "search" placeholder="Masukkan ID Order" aria-label="Masukkan ID Order" aria-describedby="button-addon2">
                                <button class="btn btn-primary fw-medium text-lg" type="submit" id="button-addon2">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()