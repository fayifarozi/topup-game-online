@extends('master.layouts.index')

@section('title','CakStore | Admin')

@section('content')

<div class="card p-3">
            <div class="bg-card pt-30 ps-30 pe-30 pb-30">
                <h2 class="text-4xl fw-bold color-palette-1 mb-30">Tambahkan Admin</h2>
                <form class="edit-profile" method="post" action="/master/admin/" enctype="multipart/form-data">
                    @csrf
                    <div class="photo d-flex">
                        <div class="position-relative me-20">
                            <img src="/assets/img/avatar-1.png" class="avatar img-fluid rounded-circle" id="imgRead" />
                            <div class="avatar-overlay position-absolute top-0 d-flex justify-content-center align-items-center">
                                <div class="image-upload">
                                    <label for="image">
                                        <span class="material-symbols-outlined"> cloud_upload </span>
                                    </label>
                                    <input type="file" id="image" name="image" accept="image/png, image/jpg, image/jpeg" onchange="previewFile()" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-30">
                        <label for="name" class="form-label text-lg fw-medium color-palette-1 mb-10">Full Name</label>
                        <input type="text" class="form-control rounded-pill text-lg @error('name') is-invalid @enderror" id="name" name="name" 
                            aria-describedby="name" placeholder="Enter your name" require/>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                            @enderror
                    </div>
                    <div class="pt-30">
                        <label for="email" class="form-label text-lg fw-medium color-palette-1 mb-10">Email Address</label>
                        <input type="email" class="form-control rounded-pill text-lg" id="email" name="email"
                            aria-describedby="email" placeholder="Enter your email address" require/>
                    </div>
                    <div class="pt-30">
                        <label for="phone" class="form-label text-lg fw-medium color-palette-1 mb-10">Password</label>
                        <input type="password" class="form-control rounded-pill text-lg" id="password" name="password" 
                            aria-describedby="password" placeholder="Enter your new password" require/>
                    </div>
                    <div class="button-group d-flex flex-column pt-50">
                        <button type="submit" class="btn btn-primary fw-medium text-lg text-white rounded-pill"
                            role="button">Save My Profile</button>
                    </div>
                </form>
                
            </div>
        </div>
@endsection()