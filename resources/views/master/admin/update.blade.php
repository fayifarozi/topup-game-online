@extends('master.layouts.index')

@section('title','CakStore | Admin')

@section('content')
        <div class="card p-3">
            <div class="bg-card pt-30 ps-30 pe-30 pb-30">
                <h2 class="text-4xl fw-bold color-palette-1">Settings</h2>
                <form class="edit-profile" method="post" action="/master/admin/{{ $admin->_id }}" enctype="multipart/form-data">
                    <input type="hidden" name="_id" value="{{ $admin->_id }}">
                    @csrf
                    @method('PUT')
                    <div class="photo d-flex">
                        <div class="position-relative me-20">
                            @if($admin->image)
                                <img src="{{ asset('storage/' . $admin->image) }}" class="avatar img-fluid rounded-circle" id="imgRead" />
                            @else
                                <img src="/assets/img/avatar-1.png" class="avatar img-fluid rounded-circle" id="imgRead"/>
                            @endif
                            <div class="avatar-overlay position-absolute top-0 d-flex justify-content-center    align-items-center">
                                <div class="image-upload">
                                    <label for="image"> <span class="material-symbols-outlined"> cloud_upload </span> </label>
                                    <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" onchange="previewFile()"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-30">
                        <label for="name" class="form-label text-lg fw-medium color-palette-1 mb-10">Full Name</label>
                        <input type="text" class="form-control rounded-pill text-lg" id="name" name="name" value="{{ $admin->name }}"
                            aria-describedby="name" placeholder="Enter your name">
                    </div>
                    <div class="pt-30">
                        <label for="email" class="form-label text-lg fw-medium color-palette-1 mb-10">Email Address</label>
                        <input type="email" class="form-control rounded-pill text-lg" id="email" name="email" value=" {{ $admin->email }} "
                            aria-describedby="email" placeholder="Enter your email address">
                    </div>
                    <div class="pt-30">
                        <label for="phone" class="form-label text-lg fw-medium color-palette-1 mb-10">Password</label>
                        <input type="password" class="form-control rounded-pill text-lg" id="password" name="password" value="{{ $admin->password }}"
                            aria-describedby="password" placeholder="Enter your new password">
                    </div>
                    <div class="button-group d-flex flex-column pt-50">
                        <button type="submit" class="btn btn-primary fw-medium text-lg text-white rounded-pill"
                            role="button">Save My Profile</button>
                    </div>
                </form>
            </div>
        </div>

@endsection()