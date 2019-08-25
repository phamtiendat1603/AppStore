@extends('client.layouts.master')

@section('title')
    Sản phẩm của loại {{ $producttype->name ?? '' }}
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
                    <li>{{ $producttype->name ?? '' }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- top Products -->
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                {{ $producttype->name ?? '' }}
            </h3>
            <!-- //tittle heading -->
            <div class="row">
                <!-- product left -->
                <div class="agileinfo-ads-display col-lg-9">
                    <div class="wrapper">
                        <!-- first section -->
                        @if(count($product) > 0)
                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                <div class="row">
                                    @foreach($product as $key => $pro)
                                        <div class="col-md-4 product-men">
                                            <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img src="img/upload/product/{{ $pro->image }}" class="img-fluid" alt="{{ $pro->name }}">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ $pro->slug }}.html" class="link-product-add-cart">Chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 class="pt-1">
                                                <a href="{{ $pro->slug }}.html">{{ $pro->name }}</a>
                                            </h4>
                                            <div class="info-product-price my-2">
                                                @if($pro->promotional>0)
                                                    <span class="item_price">
                                                        {{ number_format($pro->promotional) }}
                                                    </span>
                                                    <del>{{ number_format($pro->price) }}</del>
                                                @else
                                                    <span class="item_price">
                                                        {{ number_format($pro->price) }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                <a href="{{ route('addCart',['id' => $pro->id]) }}">Thêm vào giỏ hàng</a>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <h2>Sản phẩm đang được cập nhật</h2>
                        @endif
                    </div>
                </div>
                <!-- //product left -->
                <!-- product right -->
                @include('client.layouts.sidebar')
            </div>
        </div>
    </div>
    <!-- //top products -->
@endsection