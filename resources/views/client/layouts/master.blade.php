<!DOCTYPE html>
<html lang="vi">

<head>
	<title>Electro Store - @yield('title') </title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
	<!-- //Meta tag Keywords -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Custom-Files -->
	<link href="assets/client/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="assets/client/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="assets/client/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="assets/client/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="assets/client/css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="assets/client/css/lato.css" rel="stylesheet">
	<link href="assets/client/css/opensan.css" rel="stylesheet">
	<!-- //web fonts -->
	<link rel="stylesheet" type="text/css" href="assets/admin/css/toastr.css">
	<link rel="stylesheet" type="text/css" href="assets/client/css/easy-responsive-tabs.css">
</head>

<body>
	<!-- top-header -->
	@include('client.layouts.header-top')

	<!-- Button trigger modal(select-location) -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="select-city">
			<h3>
				<i class="fas fa-map-marker"></i> Please Select Your Location</h3>
			<select class="list_of_cities">
				<optgroup label="Popular Cities">
					<option selected style="display:none;color:#eee;">Select City</option>
					<option>Birmingham</option>
					<option>Anchorage</option>
					<option>Phoenix</option>
					<option>Little Rock</option>
					<option>Los Angeles</option>
					<option>Denver</option>
					<option>Bridgeport</option>
					<option>Wilmington</option>
					<option>Jacksonville</option>
					<option>Atlanta</option>
					<option>Honolulu</option>
					<option>Boise</option>
					<option>Chicago</option>
					<option>Indianapolis</option>
				</optgroup>
			</select>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //shop locator (popup) -->

	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Đăng Nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('login') }}" method="post">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Địa Chỉ Email</label>
							<input type="text" class="form-control" placeholder=" " name="email">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật Khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="password">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Đăng Nhập">
						</div>
						<div class="right-w3l">
							<a href="login/facebook" class="btn btn-primary">Đăng nhập bằng facebook</a>
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" name='remember' id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing" >Nhớ Mật Khẩu?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3">Nếu bạn chưa có tài khoản?
							<a href="#" data-toggle="modal" data-target="#register">
								Đăng Ký Ngay
							</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Đăng Ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('register') }}" method="post">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Họ và tên</label>
							<input type="text" class="form-control" placeholder="Nhập họ và tên" name="name">
							@if($errors->has('name'))
								<div class="alert alert-danger">
									{{ $errors->first('name') }}
								</div>
		                    @endif
						</div>
						<div class="form-group">
							<label class="col-form-label">Địa chỉ email</label>
							<input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email">
							@if($errors->has('email'))
								<div class="alert alert-danger">
									{{ $errors->first('email') }}
								</div>
		                    @endif
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" id="password1">
							@if($errors->has('password'))
								<div class="alert alert-danger">
									{{ $errors->first('password') }}
								</div>
		                    @endif
						</div>
						<div class="form-group">
							<label class="col-form-label">Nhập lại mật khẩu</label>
							<input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="re_password" id="password2">
							@if($errors->has('re_assword'))
								<div class="alert alert-danger">
									{{ $errors->first('re_password') }}
								</div>
		                    @endif
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control register" value="Đăng Ký">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input dieukhoan" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">Đồng ý với <a href="#">điều khoản</a> của chúng tôi</label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	@include('client.layouts.header-bottom')
	
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	@include('client.layouts.menu')
	<!-- //navigation -->

	<!-- banner -->
	@yield('slide')
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			@yield('content')
		</div>
	</div>
	<!-- //top products -->

	<!-- footer -->
	@include('client.layouts.footer')
</body>

</html>