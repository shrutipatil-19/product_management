@extends('frontend.layout.app')

@section('page-content')
<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
    <div class="swiper main-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6">
                            <div class="banner-content">
                                <h1 class="display-2 text-uppercase text-dark pb-5">Your Products Are Great.</h1>
                                <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="image-holder">
                                <img src="{{ asset('frontend-assets/images/banner-image.png') }}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="row d-flex flex-wrap align-items-center">
                        <div class="col-md-6">
                            <div class="banner-content">
                                <h1 class="display-2 text-uppercase text-dark pb-5">Technology Hack You Won't Get</h1>
                                <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="image-holder">
                                <img src="{{ asset('frontend-assets/images/banner-image.png') }}" alt="banner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-prev">
        <svg class="chevron-left">
            <use xlink:href="#chevron-left" />
        </svg>
    </div>
    <div class="swiper-icon swiper-arrow swiper-arrow-next">
        <svg class="chevron-right">
            <use xlink:href="#chevron-right" />
        </svg>
    </div>
</section>

<section id="mobile-products" class="product-store position-relative padding-large no-padding-top mt-5">
    <div class="container">
        <div class="row">
            <div class="display-header d-flex justify-content-between pb-3">
                <h2 class="display-7 text-dark text-uppercase">Products</h2>
                <div class="btn-right">
                    <a href="#" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
                </div>
            </div>
            <div class="swiper product-swiper">
                <div class="swiper-wrapper">

                    @foreach($products as $product)
                    <div class="swiper-slide">
                        <div class="product-card position-relative">
                            <div class="image-holder">

                                @foreach(json_decode($product->image, true) as $img)
                                <img src="{{ url('storage/app/public/' . $img) }}"
                                    alt="{{ $product->name }}"
                                    class="img-fluid">
                                @endforeach

                            </div>
                            <div class="cart-concern position-absolute">
                                <div class="cart-button d-flex">
                                    <!-- <a href="#" class="btn btn-medium btn-black">
                                        Add to Cart
                                        <svg class="cart-outline">
                                            <use xlink:href="#cart-outline"></use>
                                        </svg>
                                    </a> -->
                                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-medium btn-black">
                                        Add to Cart
                                        <svg class="cart-outline">
                                            <use xlink:href="#cart-outline"></use>
                                        </svg>
                                    </a>

                                </div>
                            </div>
                            <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                <h3 class="card-title text-uppercase">
                                    <a href="#">{{ $product->name }}</a>
                                </h3>
                                <span class="item-price text-primary">${{ $product->price }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination position-absolute text-center"></div>
</section>
@endsection