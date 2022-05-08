@extends('layouts.frontend')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Organi Shop</h2>
              <div class="breadcrumb__option">
                <a href="./index.html">Home</a>
                <span>Shop</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-5">
            @include('frontend.shop.sidebar')
          </div>
          <div class="col-lg-9 col-md-7">
          <div class="filter__item">
            <div class="row">
              <div class="col-lg-4 col-md-5">
                <form method="get">
                  <div class="filter__sort">
                      <label>Sort By :</label>
                      <select name="sortingBy" onchange="this.form.submit()">
                          <option value="default">Default sorting</option>
                          <option value="popularity">Popularity</option>
                          <option value="low-high">Price: Low to High</option>
                          <option value="high-low">Price: High to Low</option>
                      </select>
                  </div>
                </form>
              </div>
              <div class="col-lg-4 col-md-4">
                  <div class="filter__found">
                  <h6><span>{{ $products->total() }}</span> Products found</h6>
                  </div>
              </div>

              <div class="col-lg-4 col-md-3">
                  <div class="filter__option">
                  <span class="icon_grid-2x2"></span>
                  </div>
              </div>

            </div>
            </div>
            <div class="row">
                @forelse($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div
                            class="product__item__pic"
                            style="background-image: url({{ $product->gallery->first()->getUrl() }})"
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
                            <h6><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h6>
                            <h5>${{ $product->price }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="mx-auto display-3" >Product Empty</div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Product Section End -->
@endsection
