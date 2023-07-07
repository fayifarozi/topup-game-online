@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
    <div class="page-heading">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Payment Notification Midtrans</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive text-nowrap p-3">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <form action="/master/order">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-outline-secondary" type="submit" >
                            <span class="material-symbols-outlined"> search </span>
                        </button>
                        </div>
                    </form>
                </div>
            </div>

            <table id="list-transaksi" class="table mt-4">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>Number</th>
                        <th>Type</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Token</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->order_id }}</td>
                        <td>{{ $row->number }}</td>
                        <td>{{ $row->payment_type ?? NULL }}</td>
                        <td>Rp. {{ $row->amount }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->token }}</td>
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