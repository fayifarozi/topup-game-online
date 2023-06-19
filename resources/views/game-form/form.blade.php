@extends('layouts.page')

@section('title','CakStore | Home')

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-4">
        <div class="card border-0" style="margin-top: 1.7rem">
          <img class="product__info-img"src="/images/core/common/{{ $image }}" alt="Title" />
          <h2 class="produk__deskription" style="margin-top: 1rem">
              {{ $title }}
          </h2>
          <p class="product__deskription">
              {{ $deskripsi }}
          </p>
        </div>
      </div>
      <div class="col-12 col-sm-8">
          <form action="/checkout" method="post">
            @csrf
            <input type="hidden" id="total_price" name="total_price" value = "">
            <div class="panel" style="margin-top: 1.7rem;">
              <div class="panel-heading">
                <h2>Masukan User ID</h2>
              </div>
              <div class="panel-body">
                <div class="form-input">
                  <input type="text" name="user_game_id" class="form-control @error('user_game_id') is-invalid @enderror" placeholder="User ID" require />
                  <p style="color: gray">
                    <small>Untuk menemukan Riot ID Anda, buka halaman profil akun dan salin Riot ID+Tag menggunakan tombol yang tersedia disamping Riot ID. (Contoh: Westbourne#SEA)</small>
                  </p>
                </div>
              </div>
            </div>
            <div class="panel">
              <div class="panel-heading">
                <h2>Pilih Nominal Top Up</h2>
              </div>
              <div class="panel-body">
                <div class="product-container">
                    <ul class="form-section__denom-group">
                      @foreach($product as $row)
                      <li class="product__card-denom" style="max-width: 15rem">
                        <input type="radio" name="kode_id" id="denom-{{ $loop->iteration }}" value="{{ $row->kode_id }}" />
                        <label for="denom-{{ $loop->iteration }}" >
                          <img class="product__img" src="/images/core/denom-image/{{ $denomImg }}" alt="" />
                          <div class="product__detail-text">
                            <span id="item">{{ $row->item }}</span>
                            <br>
                            <span id="price">Rp.{{ $row->price }}</span>
                          </div>
                        </label>
                      </li>
                      @endforeach
                    </ul>
                </div>
              </div>
            </div>
            <div class="panel">
              <div class="panel-heading d-flex justify-content-between">
                <h2>Total Bayar</h2>
                <h2 class="color-palette-1" id="paytext-1"> </h2>
              </div>
            </div>
            <div class="panel">
              <div class="panel-heading">
                <h2>Beli</h2>
              </div>
              <div class="panel-body">
                <p style="color: gray">
                  <small>Masukan whatsApp agar pesanan anda cepat diproses!</small ></p>
                <div class="form-input">
                  <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="NOMER HP" require />
                </div>
                <p style="color: gray; margin-top:10px;">
                  <small>(Optional) Jika ingin bukti pembayaran atas pembelian anda. Isikan email anda.</small ></p>
                <div class="form-input">
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"/>
                </div>
                  <button class="btn-topup" type="submit">Top-Up</button>
              </div>
            </div>
          </form>
      </div>
    </div>
    </div>
  </div>
</section>
@endsection()
@section('script')
<script type="text/javascript">
  $(document).on("click", ".product__card-denom", function () {
    $(this).addClass("active").siblings().removeClass("active");

    var price = $(".product__card-denom.active #price").text();
    $("#paytext-1").text(price);
    var numericValue = parseFloat(price.match(/\d+(\.\d+)?/));
    $("#total_price").val(numericValue);

  });
</script>
@endsection()