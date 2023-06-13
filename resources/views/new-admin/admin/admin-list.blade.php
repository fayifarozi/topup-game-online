@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
        <div class="card">
            <h2 class="text-4xl fw-bold color-palette-1 mb-30 p-3">List Admin</h2>
            <div class="table-responsive p-3">
                <!-- text-nowrap -->
                <a href="/master/admin/create" class="btn btn-primary"> + Tambahkan </a>
                <br /><br />
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
                                <a class="navbar-brand text-white" href="/master">
                                        <img src="/assets/img/avatar-1.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                                </a>
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td class="d-flex" >
                            <!-- <td style="display:inline-flex;" > -->
                                <a href="/master/admin/{{ $row->_id}}/edit" class="btn btn-warning mx-1"><span class="material-symbols-outlined"> edit </span></a>
                                <form method="post" action="/master/admin/{{ $row->_id }}">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger mx-1"  onclick="return confirm('Are you sure?');"><span class="material-symbols-outlined"> delete </span></button>
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