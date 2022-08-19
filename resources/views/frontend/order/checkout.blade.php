@extends('layouts.checkout')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Checkout</h2>
              <div class="breadcrumb__option">
                <a href="/">Home</a>
                <span>Checkout</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
      <div class="container" id="checkout">
      </div>
    </section>
    <!-- Checkout Section End -->
@endsection