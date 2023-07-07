@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
<div class="page-heading">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Admin</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('master')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="card">
        <div class="table-responsive p-3">
            <a href="/master/admin/create" class="btn btn-primary"> + Tambahkan </a>
            <br />
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                </div>
            @endif
            <br />
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->iteration  + $data->firstItem() - 1 }}</td>
                        <td>
                            @if($row->image)
                            <img src="{{ asset('images/profiles/' . $row->image) }}" alt="Logo" width="35" height="35" class="avatar">
                            @else
                            <img src="/assets/img/avatar-1.png" alt="Logo" width="35" height="35" class="avatar">
                            @endif
                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td class="d-flex" >
                            <a href="/master/admin/{{ $row->_id}}/edit" class="btn btn-warning mx-1"><span class="material-symbols-outlined"> edit </span></a>
                            <form method="post" action="/master/admin/{{ $row->_id }}">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger mx-1" onclick="return confirm('Are you sure?');"><span class="material-symbols-outlined"> delete </span></button>
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
</div>

@endsection()