@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
    <div class="card">
        <h2 class="text-4xl fw-bold color-palette-1 mb-30 p-3">List Order</h2>
        <div class="table-responsive text-nowrap p-3">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <!-- <a href="/master/order/create" class="btn btn-primary"> + Tambahkan </a> -->
                </div>
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
            <br />
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                </div>
            @endif
            <br />

            <table id="list-transaksi" class="table">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>Game</th>
                        <th>Item</th>
                        <th>Email</th>
                        <th>Payment</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->order_code }}</td>
                        <td>{{ $row->product->game ?? 'NULL'}}</td>
                        <td>{{ $row->product->item ?? 'NULL'}}</td>
                        <td>{{ $row->email ?? '-'}}</td>
                        <td>{{ $row->payment_status }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                        @if( $row->status === "cancelled")
                        <span class="material-symbols-outlined"> cancel </span>
                        @elseif( $row->status === "proceed")
                        <span class="material-symbols-outlined"> hourglass_bottom </span>
                        @else
                        <span class="material-symbols-outlined"> check_circle </span>
                        @endif
                        </td>
                        <td>
                            <a href="/master/order/{{ $row->_id }}/detail" class="btn btn-info">Details</a>
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