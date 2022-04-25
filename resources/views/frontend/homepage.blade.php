@extends('layouts.frontend')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="mb-5">
      <div class="container">
          <div class="hero__item set-bg" data-setbg="{{ asset('frontend/img/hero/banner.jpg') }}">
              <div class="hero__text">
                  <span>FRUIT FRESH</span>
                  <h2>Vegetable <br />100% Organic</h2>
                  <p>Free Pickup and Delivery Available</p>
                  <a href="#" class="primary-btn">SHOP NOW</a>
              </div>
          </div>
      </div>
    </section>
      <!-- Breadcrumb Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
      <div class="container">
        <div class="row">
          <div class="categories__slider owl-carousel">
            @foreach($menu_categories as $menu_category)
              <div class="col-lg-3">
                <div
                  class="categories__item set-bg"
                  data-setbg="{{ $menu_category->photo->getUrl() }}"
                >
                  <h5><a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></h5>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>Featured Product</h2>
            </div>
          </div>
        </div>
        <div class="row featured__filter">
          <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="{{ asset('frontend/img/featured/feature-1.jpg') }}"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="#">Crab Pool Security</a></h6>
                <h5>$30.00</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="{{ asset('frontend/img/featured/feature-2.jpg') }}"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="#">Crab Pool Security</a></h6>
                <h5>$30.00</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="{{ asset('frontend/img/featured/feature-3.jpg') }}"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="#">Crab Pool Security</a></h6>
                <h5>$30.00</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="{{ asset('frontend/img/featured/feature-4.jpg') }}"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="#">Crab Pool Security</a></h6>
                <h5>$30.00</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="{{ asset('frontend/img/featured/feature-5.jpg') }}"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="#">Crab Pool Security</a></h6>
                <h5>$30.00</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="{{ asset('frontend/img/featured/feature-6.jpg') }}"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="#">Crab Pool Security</a></h6>
                <h5>$30.00</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="{{ asset('frontend/img/featured/feature-7.jpg') }}"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="#">Crab Pool Security</a></h6>
                <h5>$30.00</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
            <div class="featured__item">
              <div
                class="featured__item__pic set-bg"
                data-setbg="{{ asset('frontend/img/featured/feature-8.jpg') }}"
              >
                <ul class="featured__item__pic__hover">
                  <li>
                    <a href="#"><i class="fa fa-heart"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="#">Crab Pool Security</a></h6>
                <h5>$30.00</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="{{ asset('frontend/img/banner/banner-1.jpg') }}" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="{{ asset('frontend/img/banner/banner-2.jpg') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner End -->
@endsection
