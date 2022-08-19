@extends('layouts.frontend')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Vegetable’s Package</h2>
              <div class="breadcrumb__option">
                <a href="./index.html">Home</a>
                <a href="./index.html">Vegetables</a>
                <span>Vegetable’s Package</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad" id="product-detail">
     
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title related__product__title">
              <h2>Related Product</h2>
            </div>
          </div>
        </div>
        <div class="row">
        @forelse($related_products as $related_product)
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="product__item">
              <div
                class="product__item__pic set-bg"
                data-setbg="{{ $related_product->gallery->first()->getUrl() }}"
              >
                <ul class="product__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="">{{ $related_product->name }}</a></h6>
                <h5>${{ $related_product->price }}</h5>
              </div>
            </div>
          </div>
          @empty
          <div class="col">
            <div class="product__item">
              <h5 class="text-center">Product Related Empty</h5>
            </div>
          </div>
        @endforelse
        </div>
      </div>
    </section>
    <!-- Related Product Section End -->
@endsection