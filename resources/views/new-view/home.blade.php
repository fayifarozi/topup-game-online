@extends('layouts.page')

@section('title','Cakstore')

@section('content')

<div class="section bg-light">
    <div class="container">
        
        @include('new-view.banner')

        <div class="content bg-transparent my-4">
            <div class="card rounded-4 px-3">
                <div class="d-flex justify-content-between align-items-center py-3 px-4">
                    <a class="h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" href="">
                        <img class="" style="width: 30px; height: 30px;" src="/img/icon-category/mobile-game.jpg" alt="Game">
                        <span class="text-dark fs-xs fw-light mt-1 text-center">Game</span>
                    </a>
                    <a class="h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" href="">
                        <img class="" style="width: 30px; height: 30px;" src="/img/icon-category/pc-game.jpg" alt="PC Game">
                        <span class="text-dark fs-xs fw-light mt-1 text-center">PC Game</span>
                    </a>
                    <a class="h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" href="">
                        <img class="" style="width: 30px; height: 30px;" src="/img/icon-category/voucher.jpg" alt="Voucher Game">
                        <span class="text-dark fs-xs fw-light mt-1 text-center">Voucher</span>
                    </a>
                    <a class="h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" href="">
                        <img class="" style="width: 30px; height: 30px;" src="/img/icon-category/streaming.png" alt="Voucher Game">
                        <span class="text-dark fs-xs fw-light mt-1 text-center">Streaming</span>
                    </a>
                    <a class="h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" href="">
                        <img class="" style="width: 30px; height: 30px;" src="/img/icon-category/eWallet.png" alt="Voucher Game">
                        <span class="text-dark fs-xs fw-light mt-1 text-center">E-Wallet</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row row-cols-2 row-cols-lg-5 g-2 g-md-3">
            @foreach($data as $row)
            <div class="col p-3">
                <a href="/test/{{ $row->path }}" class="product-link">
                    <div class="card rounded-4">
                        <img src="{{ asset('img/product-tiles/' . $row->image) }}" alt="{{ $row->path }}" class="rounded-bottom rounded-4"/>
                        <div class="card-body">
                            <h4 class="card-text text-uppercase text-center">{{ $row->name }}</h4>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection()