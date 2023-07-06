@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
<div class="page-heading">
    <h2>List Hero Product</h2>
</div>
<div class="page-content">
    <div class="card">
        <div class="card text-nowrap p-3">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a href="/master/hero-product/create" class="btn btn-primary"> + Tambahkan </a>
                </div>
                <div class="col-auto">
                    <!-- <form action="/master/product">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-outline-secondary" type="submit" >
                            <span class="material-symbols-outlined"> search </span>
                        </button>
                    </div>
                    </form> -->
                </div>
            </div>
            <br />
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                </div>
            @endif
            <br />
            <div class="row row-cols-auto justify-content-start">
                @foreach($data as $row)
                <div class="col p-3">
                    <div class="card shadow" style="width: 16rem;">
                        @if ($row->image !== null)
                            <img src="{{ asset('images/core/product-tiles/' . $row->image) }}" class="card-img-top" alt="...">
                        @else
                            <img src="/assets/img/Thumbnail-1.png" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="card-title" id="field">{{ $row->name }}</h4>
                                </div>
                                <div class="col-4">
                                    @if( $row->status == 'active')
                                        <span class="badge bg-success">{{$row->status}}</span>
                                    @else
                                        <span class="badge bg-danger">{{$row->status}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center gap-1 border-0" >
                            <a href="{{ route('hero-product.edit', ['hero_product' => $row->_id]) }}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{ route('hero-product.updateStatus') }}" id="updateStatus">
                                @csrf
                                <input type="hidden" name="hero_product" value="{{ $row->_id}}">
                                @if( $row->status == 'active')
                                <input type="hidden" name="status" value="deactive">
                                <button type="button" class="btn btn-danger" onclick="updateStatus()">Deactive</button>
                                @else
                                <input type="hidden" name="status" value="active">
                                <button type="button" class="btn btn-danger" onclick="updateStatus()">Active</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection()
@section('script')
<script>
    function updateStatus() {
        Swal.fire({
            title: "Confirmation",
            text: "Are you sure you want to change status ?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("updateStatus").submit();
            }
        });
    }
</script>
@endsection
