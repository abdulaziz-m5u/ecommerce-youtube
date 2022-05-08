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
    <section class="product-details spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
              <div class="product__details__pic__item">
                <img
                  class="product__details__pic__item--large"
                  src="{{ $product->gallery->first()->getUrl() }}"
                  alt="{{ $product->name }}"
                />
              </div>
              <div class="product__details__pic__slider owl-carousel">
                @foreach($product->getMedia('gallery') as $gallery)
                <img
                  data-imgbigurl="{{ $gallery->getUrl() }}"
                  src="{{ $gallery->getUrl() }}"
                  alt=""
                />
                @endforeach

              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
              <h3>{{ $product->name }}</h3>
              <div class="product__details__rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <span>(18 reviews)</span>
              </div>
              <div class="product__details__price">${{ $product->price }}</div>
              <p>
                {{ $product->description }}
              </p>
              <div class="product__details__quantity">
                <div class="quantity">
                  <div class="pro-qty">
                    <input type="text" value="1" />
                  </div>
                </div>
              </div>
              <a href="#" class="primary-btn">ADD TO CARD</a>
              <a href="#" class="heart-icon"
                ><span class="icon_heart_alt"></span
              ></a>
              <ul>
                <li><b>Weight</b> <span>{{ $product->weight }} gram</span></li>
                <li>
                  <b>Share on</b>
                  <div class="share">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="product__details__tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#tabs-1"
                    role="tab"
                    aria-selected="true"
                    >Description</a
                  >
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#tabs-3"
                    role="tab"
                    aria-selected="false"
                    >Reviews <span>(1)</span></a
                  >
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Products Infomation</h6>
                    {{ $product->details }}
                  </div>
                </div>
                <div class="tab-pane" id="tabs-3" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Products Infomation</h6>
                    <p>
                      Vestibulum ac diam sit amet quam vehicula elementum sed
                      sit amet dui. Pellentesque in ipsum id orci porta dapibus.
                      Proin eget tortor risus. Vivamus suscipit tortor eget
                      felis porttitor volutpat. Vestibulum ac diam sit amet quam
                      vehicula elementum sed sit amet dui. Donec rutrum congue
                      leo eget malesuada. Vivamus suscipit tortor eget felis
                      porttitor volutpat. Curabitur arcu erat, accumsan id
                      imperdiet et, porttitor at sem. Praesent sapien massa,
                      convallis a pellentesque nec, egestas non nisi. Vestibulum
                      ac diam sit amet quam vehicula elementum sed sit amet dui.
                      Vestibulum ante ipsum primis in faucibus orci luctus et
                      ultrices posuere cubilia Curae; Donec velit neque, auctor
                      sit amet aliquam vel, ullamcorper sit amet ligula. Proin
                      eget tortor risus.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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