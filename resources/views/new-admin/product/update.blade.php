@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')

<div class="card p-3">
    <div class="bg-card ps-30 pe-30 pb-30">
        <h2 class="text-4xl fw-bold color-palette-1">Update</h2>
        <form method="post" action="/master/product/{{ $product->_id }}">
        <input type="hidden" name="_id" value=" {{ $product->_id }}">
            @csrf
            @method('PUT')
            <div class="pt-30">
                <label for="game" class="form-label text-lg fw-medium color-palette-1 mb-10">Game</label><br />
                <input class="form-control rounded-pill text-lg @error('game') is-invalid @enderror" name="game" id="game" type="text" required value="{{ $product->game }}"/>
            </div>
            <div class="pt-30">
                <label for="virtual" class="form-label text-lg fw-medium color-palette-1 mb-10">Item Produk</label><br />
                <input class="form-control rounded-pill text-lg @error('item') is-invalid @enderror" name="item" id="item" type="text" required value="{{ $product->item }}"/>
            </div>
            <div class="pt-30 mb-20">
                <label for="harga" class="form-label text-lg fw-medium color-palette-1 mb-10">Price</label><br />
                <input class="form-control rounded-pill text-lg @error('harga') is-invalid @enderror" name="price" id="price" type="text" required value="{{ $product->price }}" />
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="active">
                <label class="form-check-label" for="inlineRadio1">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="non-active">
                <label class="form-check-label" for="inlineRadio2">Non-Active</label>
            </div>
            <div class="button-group d-flex flex-column pt-50">
                    <button type="submit" class="btn btn-primary fw-medium text-lg text-white rounded-pill"
                    role="button">Update</button>
            </div>
            
        </form>
    </div>
</div>
@endsection()