@extends('layouts.main')

@section('title','CakStore | Product')

@section('content')

<div class="section">
  <div class="container">
    <div class="product-container">
      <div class="product__link-card">
        <a href="/mobile-legends" class="product__link">
          <img src="img/product-tiles/tile-mlbb.png" alt="" />
          <h3>MOBILE LEGENS</h3>
        </a>
      </div>
      <div class="product__link-card">
        <a href="/free-fire" class="product__link">
          <img src="img/product-tiles/tile-ff.png" alt="" />
          <h3>FREE FIRE</h3>
        </a>
      </div>
      <div class="product__link-card">
        <a href="/genshin-impact" class="product__link">
          <img src="img/product-tiles/tile-genshin.png" alt="" />
          <h3>GENSHIN IMPACT</h3>
        </a>
      </div>
      <div class="product__link-card">
        <a href="/pubg-mobile" class="product__link">
          <img src="img/product-tiles/tile-pubgm.png" alt="" />
          <h3>PUBG MOBILE</h3>
        </a>
      </div>
      <div class="product__link-card">
        <a href="/valorant" class="product__link">
          <img src="img/product-tiles/tile-valorant.png" alt="" />
          <h3>VALORANT</h3>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection()