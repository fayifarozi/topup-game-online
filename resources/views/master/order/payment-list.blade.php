@extends('master.layouts.index')

@section('title','CakStore | Admin')

@section('content')
    <div class="card">
        <h2 class="text-4xl fw-bold color-palette-1 mb-10 p-3">Payment Nofification Midtrans</h2>
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