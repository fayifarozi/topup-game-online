@extends('new-admin.layouts.index')

@section('title','CakStore | Admin')

@section('content')
<div class="page-heading">
    <h3>Tambah Hero Product</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card p-3">
            <form action="/master/hero-product" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="hero_id" value="{{ $hero_id }}">
                <div class="row">
                    <div class="col-12 col-md-4 mb-3" align="center">
                        <div class="card photo-card border-0 mb-0" style="width:300px;">
                            <img src="/assets/img/Thumbnail-1.png" class="photo img-fluid" id="imgRead"/>
                            <div class="photo-overlay">
                                <i class="bi bi-cloud-arrow-up"></i>
                                <div class="image-upload">
                                    <input type="file" id="image" name="image" accept="image/png, image/jpg, image/jpeg" onchange="previewFile()" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name">Hero name</label>
                                <input type="text" class="form-control mb-2" id="name" name="name" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="form-select" aria-label="Default select example">
                                    <option selected>-- Pilih Category --</option>
                                    <option value="game-mobile">Game Mobile</option>
                                    <option value="game-pc">Game PC</option>
                                    <option value="voucher">Voucher</option>
                                    <option value="streaming">Streaming</option>
                                    <option value="e-wallet">E-Wallet</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description">Deskripsi</label>    
                                <textarea class="form-control" placeholder="Masukan Deskripsi Game" id="description" name="description"></textarea>
                            </div>
                            <div class="d-grid gap-2 pt-4">
                                <button type="submit" class="btn btn-primary rounded-pill" type="button">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection()

@section('script')
<script type='text/javascript'>
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