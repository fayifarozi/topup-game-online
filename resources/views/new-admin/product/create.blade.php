@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
<div class="page-heading">
    <h3>Tambah Voucher</h3>
</div>
<div class="page-content">
        <div class="card p-3">
            <form method="post" action="/master/product">
                @csrf
                <input type="hidden" name="kode_id" value="{{ $kode_id }}">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="game" class="form-label text-lg fw-medium color-palette-1">Game</label><br />
                        <input class="form-control rounded-pill text-lg" name="game" id="game" type="text" placeholder="Enter a game name" required />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="virtual" class="form-label text-lg fw-medium color-palette-1">Item</label><br />
                        <input class="form-control rounded-pill text-lg" name="item" id="item" type="text" placeholder="Enter number of items" required />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="harga" class="form-label text-lg fw-medium color-palette-1">Price</label><br />
                        <small class="text-sm fw-medium color-palette-1">Note: Automatically the price will be added with a 10% fee</small>
                        <input class="form-control rounded-pill text-lg" name="price" id="price" type="text" placeholder="Enter the price of the item" required />
                    </div>
                </div>
                <div class="button-group d-flex flex-column pt-50">
                    <button type="submit" class="btn btn-primary w-medium text-lg text-white rounded-pill">Tambahkan</button>
                </div>
            </form>
        </div>
</div>
    
@endsection()
