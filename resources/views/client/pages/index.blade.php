@extends('client.layouts.master')
@section('title')
	Trang chủ
@endsection

@section('slide')
	@include('client.layouts.slide')
@endsection

@section('content')
	<!-- tittle heading -->
	<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
		<span>O</span>ur
		<span>N</span>ew
		<span>P</span>roducts</h3>
	<!-- //tittle heading -->
	<div class="row">
		<!-- product left -->
		<div class="agileinfo-ads-display col-lg-9">
			<div class="wrapper">
				<!-- first section -->
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
					<h3 class="heading-tittle text-center font-italic">@if(isset($prosamsung)) {{ $prosamsung[0]->categories->name }} @endif</h3>
					<div class="row">
						@foreach($prosamsung as $pro)
							<div class="col-md-4 product-men mt-5">
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
				<!-- //first section -->
				<!-- second section -->
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
					<h3 class="heading-tittle text-center font-italic">{{ $proTaiNghe[0]->categories->name }}</h3>
					<div class="row">
						@foreach($proTaiNghe as $pro)
							<div class="col-md-4 product-men mt-5">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item text-center">
										<img src="img/upload/product/{{ $pro->image }}" class="img-fluid" alt="{{ $pro->name }}">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="#" class="link-product-add-cart">Chi tiết</a>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
										<h4 class="pt-1">
											<a href="single.html">{{ $pro->name }}</a>
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
				<!-- //second section -->
				<!-- third section -->
				<div class="product-sec1 product-sec2 px-sm-5 px-3">
					<div class="row">
						<h3 class="col-md-4 effect-bg">Summer Carnival</h3>
						<p class="w3l-nut-middle">Get Extra 10% Off</p>
						<div class="col-md-8 bg-right-nut">
							<img src="assets/client/images/image1.png" alt="">
						</div>
					</div>
				</div>
				<!-- //third section -->
				<!-- fourth section -->
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
					<h3 class="heading-tittle text-center font-italic">Large Appliances</h3>
					<div class="row">
						<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="assets/client/images/m7.jpg" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
								</div>
								<span class="product-new-top">New</span>
								<div class="item-info-product text-center border-top mt-4">
									<h4 class="pt-1">
										<a href="single.html">Whirlpool 245</a>
									</h4>
									<div class="info-product-price my-2">
										<span class="item_price">$230.00</span>
										<del>$280.00</del>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name" value="Whirlpool 245" />
												<input type="hidden" name="amount" value="230.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
												<input type="hidden" name="currency_code" value="USD" />
												<input type="hidden" name="return" value=" " />
												<input type="hidden" name="cancel_return" value=" " />
												<input type="submit" name="submit" value="Add to cart" class="button btn" />
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="assets/client/images/m8.jpg" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
								</div>
								<div class="item-info-product text-center border-top mt-4">
									<h4 class="pt-1">
										<a href="single.html">BPL Washing Machine</a>
									</h4>
									<div class="info-product-price my-2">
										<span class="item_price">$180.00</span>
										<del>$200.00</del>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name" value="BPL Washing Machine" />
												<input type="hidden" name="amount" value="180.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
												<input type="hidden" name="currency_code" value="USD" />
												<input type="hidden" name="return" value=" " />
												<input type="hidden" name="cancel_return" value=" " />
												<input type="submit" name="submit" value="Add to cart" class="button btn" />
											</fieldset>
										</form>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="assets/client/images/m9.jpg" alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
								</div>
								<div class="item-info-product text-center border-top mt-4">
									<h4 class="pt-1">
										<a href="single.html">Microwave Oven</a>
									</h4>
									<div class="info-product-price my-2">
										<span class="item_price">$199.00</span>
										<del>$299.00</del>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name" value="Microwave Oven" />
												<input type="hidden" name="amount" value="199.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
												<input type="hidden" name="currency_code" value="USD" />
												<input type="hidden" name="return" value=" " />
												<input type="hidden" name="cancel_return" value=" " />
												<input type="submit" name="submit" value="Add to cart" class="button btn" />
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- //fourth section -->
			</div>
		</div>
		<!-- //product left -->

		<!-- product right -->
        @include('client.layouts.sidebar')
	</div>
@endsection