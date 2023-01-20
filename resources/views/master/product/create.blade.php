@extends('master.layouts.index')

@section('title','CakStore | Admin')

@section('content')
        <div class="card">
            <div class="bg-card pt-30 ps-30 pe-30 pb-30">
                <h2 class="text-4xl fw-bold color-palette-1 mb-10">Create</h2>
                <form method="post" action="/master/product">
                <input type="hidden" name="kode_id" value="{{ $kode_id }}">
                    @csrf
                    <div class="pt-30">
                        <label for="game" class="form-label text-lg fw-medium color-palette-1 mb-10">Game</label><br />
                        <input class="form-control rounded-pill text-lg" name="game" id="game" type="text" placeholder="Enter a game name" required />
                    </div>
                    <div class="pt-30">
                        <label for="virtual" class="form-label text-lg fw-medium color-palette-1 mb-10">Item</label><br />
                        <input class="form-control rounded-pill text-lg" name="item" id="item" type="text" placeholder="Enter number of items" required />
                    </div>
                    <div class="pt-30" >
                        <label for="harga" class="form-label text-lg fw-medium color-palette-1">Price</label><br />
                        <small class="text-sm fw-medium color-palette-1">Note: Automatically the price will be added with a 10% fee</small>
                        <input class="form-control rounded-pill text-lg mt-10" name="price" id="price" type="text" placeholder="Enter the price of the item" required />
                    </div>
                    <div class="button-group d-flex flex-column pt-50">
                        <button type="submit" class="btn btn-primary w-medium text-lg text-white rounded-pill">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
@endsection()
