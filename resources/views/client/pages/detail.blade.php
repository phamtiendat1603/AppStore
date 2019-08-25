@extends('client.layouts.master')

@section('title')
    Chi tiết sản phẩm - {{ $product->name }}
@endsection

@section('content')
    <!-- banner-2 -->
    <div class="page-head_agile_info_w3l"></div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="trangchu">Trang Chủ</a>
                        <i>|</i>
                    </li>
                    <li>{{ $product->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- Single Page -->
    <div class="banner-bootom-w3-agileits py-5">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>S</span>ản
                <span>P</span>hẩm</h3>

            <!-- //tittle heading -->
            <div class="row">
                <div class="col-lg-5 col-md-8 single-right-left ">
                    <div class="grid images_3_of_2">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="img/upload/product/{{ $product->image }}">
                                    <div class="thumb-image">
                                        <img src="img/upload/product/{{ $product->image }}" data-imagezoom="true" class="img-fluid" alt="">
                                    </div>
                                </li>
                                <li data-thumb="img/upload/product/{{ $product->image }}">
                                    <div class="thumb-image">
                                        <img src="img/upload/product/{{ $product->image }}" data-imagezoom="true" class="img-fluid" alt="">
                                    </div>
                                </li>
                                <li data-thumb="img/upload/product/{{ $product->image }}">
                                    <div class="thumb-image">
                                        <img src="img/upload/product/{{ $product->image }}" data-imagezoom="true" class="img-fluid" alt="">
                                    </div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                    <h3 class="mb-3">{{ $product->name }}</h3>
                    <p class="mb-3">
                        @if($product->promotional > 0)
                            <span class="item_price">
                                {{ number_format($product->promotional) }} VNĐ
                            </span>
                            <del class="mx-2 font-weight-light">
                                {{ number_format($product->price) }} VNĐ
                            </del>
                        @else
                            <span class="item_price">
                                {{ number_format($product->price) }} VNĐ
                            </span>
                        @endif
                        <label>Giao hàng miễn phí</label>
                    </p>
                    <div class="single-infoagile">
                        <ul>
                            <li class="mb-3">
                                Thanh toán sau khi giao hàng
                            </li>
                            <li class="mb-3">
                                Giao hàng sớm nhất có thể
                            </li>
                            <li class="mb-3">
                                Khuyến mãi từ 500.000 VNĐ/tháng
                            </li>
                            <li class="mb-3">
                                Ưu đãi giảm 5% khi thanh toán bằng thẻ ngân hàng
                            </li>
                        </ul>
                    </div>
                    <div class="product-single-w3l">
                        <p class="my-3">
                            <i class="far fa-hand-point-right mr-2"></i>
                            {{ $product->warranty }}
                        </p>
                        {!! $product->detail !!}
                        <p class="my-sm-4 my-3">
                            <i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
                        </p>
                    </div>
                    <div class="occasion-cart">
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <a href="{{ route('addCart',['id' => $product->id]) }}">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection