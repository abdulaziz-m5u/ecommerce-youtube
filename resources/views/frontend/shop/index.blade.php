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
            <div class="sidebar">
              <div class="sidebar__item">
                <h4>Categories</h4>
                <ul>
                  @foreach($menu_categories as $menu_category)
                    <li>
                      <a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a>
                        <ul>
                          @foreach($menu_category->children as $child)
                            <li class="px-2">
                              <a href="{{ route('shop.index', $child->slug) }}" style="color: #b4b4b4;">{{ $child->name }}</a>
                            </li>
                          @endforeach
                        </ul>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="sidebar__item">
                <h4>Tags</h4>
                <div class="sidebar__item__size">
                  <label for="large">
                    <a href="">large</a>
                  </label>
                </div>
                <div class="sidebar__item__size">
                  <label for="medium">
                    Medium
                    <input type="radio" id="medium" />
                  </label>
                </div>
                <div class="sidebar__item__size">
                  <label for="small">
                    Small
                    <input type="radio" id="small" />
                  </label>
                </div>
                <div class="sidebar__item__size">
                  <label for="tiny">
                    Tiny
                    <input type="radio" id="tiny" />
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-md-7">
            <div class="filter__item">
              <div class="row">
                <div class="col-lg-4 col-md-5">
                  <div class="filter__sort">
                    <span>Sort By</span>
                    <select>
                      <option value="0">Default</option>
                      <option value="0">Default</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4">
                  <div class="filter__found">
                    <h6><span>16</span> Products found</h6>
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
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-1.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-2.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-3.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-4.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-5.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-6.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-7.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-8.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-9.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-10.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-11.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                  <div
                    class="product__item__pic set-bg"
                    data-setbg="{{ asset('frontend/img/product/product-12.jpg') }}"
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
                    <h6><a href="#">Crab Pool Security</a></h6>
                    <h5>$30.00</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Product Section End -->
@endsection
