@extends('new-admin.layouts.index')


@section('title','CakStore | Admin')

@section('content')
<section class="section">
    <div class="row">
        <div class="col">
            <div class="card p-3">
            <form action="/master/admin/" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card photo-card">
                            <img src="/img/banner/freefire.jpg" class="photo img-fluid" id="imgRead" />
                            <div class="photo-overlay">
                                <i class="bi bi-cloud-arrow-up"></i>
                                <div class="image-upload">
                                <input type="file" id="image" name="image" accept="image/png, image/jpg, image/jpeg" onchange="previewFile()" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control mb-2" id="name" name="name"  required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control mb-2" id="email" name="email" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-pill" type="button">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
<script>
    function previewFile() {
        const preview = document.querySelector("#imgRead");
        const file = document.querySelector("input[type=file]").files[0];
        const reader = new FileReader();

        reader.addEventListener(
            "load",
            () => {
                preview.src = reader.result;
            },
            false
        );

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection()