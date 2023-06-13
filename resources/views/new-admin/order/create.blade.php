@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
<div class="card p-3">  
    <div class="bg-card pt-30 ps-30 pe-30 pb-30">
        <h2 class="text-4xl fw-bold color-palette-1 mb-30">Tambahkan Order</h2>
        <form class="edit-profile" method="post" action="/master/order">
            <input type="hidden" id="status" id="status">
            @csrf
            <div class="pt-30">
                <label for="userId" class="form-label text-lg fw-medium color-palette-1 mb-10">User Game ID</label>
                <input type="text" class="form-control rounded-pill text-lg @error('user_info') is-invalid @enderror" id="user_game_id" name="user_game_id" 
                    aria-describedby="userId" placeholder="Enter ID game" require>
            </div>
            <div class="pt-30">
                <label for="userId" class="form-label text-lg fw-medium color-palette-1 mb-10">Email</label>
                <input type="text" class="form-control rounded-pill text-lg @error('email') is-invalid @enderror" id="phone" name="phone" 
                    aria-describedby="email" placeholder="Enter email valid" require>
            </div>
            <div class="pt-30">
                <label for="userId" class="form-label text-lg fw-medium color-palette-1 mb-10">Number Phone</label>
                <input type="text" class="form-control rounded-pill text-lg @error('phone') is-invalid @enderror" id="phone" name="phone" 
                    aria-describedby="phone" placeholder="Enter Number Phone" require>
            </div>
            <div class="pt-30">
                <label for="text" class="form-label text-lg fw-medium color-palette-1 mb-10">Produk Item</label>
                    <select class="form-control rounded-pill text-lg @error('kode_id') is-invalid @enderror"  name="kode_id" id="kode_id" require>
                        <option selected disabled value="">Select Items Here...</option>
                        @foreach($product as $row)
                            <option value="{{$row->kode_id}}">{{$row->game}} - {{ $row->item }} Diamond</option>
                        @endforeach
                    </select>
            </div>
            <div class="button-group d-flex flex-column pt-50">
                <button type="submit" class="btn btn-primary fw-medium text-lg text-white rounded-pill"
                    role="button">Tambahkan Data</button>
            </div>

        </form>
    </div>
</div>


@endsection()
