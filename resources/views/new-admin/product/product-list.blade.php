@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
    <div class="page-heading">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Voucher Game</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Voucher</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive text-nowrap p-3">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a href="/master/product/create" class="btn btn-primary"> + Tambahkan </a>
                </div>
                <div class="col-auto">
                    <form action="/master/product">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-outline-secondary" type="submit" >
                            <span class="material-symbols-outlined"> search </span>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            <br />
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                </div>
            @endif
            <br />
            
            <table id="list-product" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Game</th>
                        <th>Denom</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <th>{{ $loop->iteration  + $data->firstItem() - 1 }}</th>
                        <td>{{ $row->kode_id }} </td>
                        <td>{{ $row->game }} </td>
                        <td>{{ $row->item }} </td>
                        <td>{{ $row->price }} </td>
                        <td>
                            @if( $row->status === "active")
                            <span class="material-symbols-outlined"> check_circle </span>
                            @else
                            <span class="material-symbols-outlined"> cancel </span>
                            @endif
                        </td>
                        
                        <td class="d-flex">
                            <a href="/master/product/{{ $row->_id }}/edit" class="btn btn-warning mx-1"><span class="material-symbols-outlined"> edit </span></a>
                            <form method="post" action="/master/product/{{ $row->_id }}">
                                    @method('delete')
                                    @csrf
                                <button class="btn btn btn-danger mx-1" onclick="return confirm('Are you sure?');"><span class="material-symbols-outlined"> delete </span></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex-coloum justify-content-center">
                    {!! $data->links() !!}
            </div>
        </div>
    </div>

@endsection()
