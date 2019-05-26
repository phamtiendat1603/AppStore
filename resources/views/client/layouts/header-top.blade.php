<div class="agile-main-top">
<div class="container-fluid">
	<div class="row main-top-w3l py-2">
		<div class="col-lg-4 header-most-top">
			<p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
				<i class="fas fa-shopping-cart ml-1"></i>
			</p>
		</div>
		<div class="col-lg-8 header-right mt-lg-0 mt-2">
			<!-- header lists -->
			<ul>
				<li class="text-center border-right text-white">
					<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
						<i class="fas fa-map-marker mr-2"></i>Select Location
					</a>
				</li>
				<li class="text-center border-right text-white">
					<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
						<i class="fas fa-truck mr-2"></i>Track Order
					</a>
				</li>
				<li class="text-center border-right text-white">
					<i class="fas fa-phone mr-2"></i> 001 234 5678
				</li>
				@if(Auth::check())
					<li class="text-center border-right ">
						<a href="logout" title="Đăng Xuất" class="text-white"><i class="fas fa-sign-in-alt mr-2"></i>{{ Auth::user()->name }}</a>
					</li>
					@if(Auth::user()->password == '')
						<div class="modal fade updatePass" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title text-center">Cập nhật password</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="updatepass" method="post">
											@csrf
											<div class="form-group">
												<label class="col-form-label">Mật Khẩu</label>
												<input type="password" class="form-control" placeholder="Nhập password mới" name="password">
												@if($errors->has('password'))
													<div class="alert alert-danger">
														{{ $errors->first('password') }}
													</div>
							                    @endif
											</div>
											<div class="form-group">
												<label class="col-form-label">Nhập Lại Mật Khẩu</label>
												<input type="password" class="form-control" placeholder="Nhập lại password" name="re_password">
												@if($errors->has('re_password'))
													<div class="alert alert-danger">
														{{ $errors->first('re_password') }}
													</div>
							                    @endif
											</div>
											<div class="right-w3l">
												<input type="submit" class="form-control" value="Cập nhật">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					@endif
				@else
					<li class="text-center border-right text-white">
						<a href="#" data-toggle="modal" data-target="#login" class="text-white">
							<i class="fas fa-sign-in-alt mr-2"></i> Đăng Nhập 
						</a>
					</li>
					<li class="text-center text-white">
						<a href="#" data-toggle="modal" data-target="#register" class="text-white">
							<i class="fas fa-sign-out-alt mr-2"></i>Đăng Ký 
						</a>
					</li>

				@endif
			</ul>
			<!-- //header lists -->
		</div>
	</div>
</div>
</div>