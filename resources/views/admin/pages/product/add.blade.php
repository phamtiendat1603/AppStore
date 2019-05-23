@extends('admin.layouts.master')

@section('title')
	Thêm sản phẩm
@endsection

@section('content')
	<div class="card shadow mb-4">
		<div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm</h6>
	    </div>
		<div class="row" style="margin: 5px">
	        <div class="col-lg-12">
	            <form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
	            	@csrf
	                <fieldset class="form-group">
	                    <label>Tên sản phẩm</label>
	                    <input class="form-control" name="name" placeholder="Nhập tên loại sản phẩm">
	                    @if($errors->has('name'))
							<div class="alert alert-danger">{{ $errors->first('name') }}</div>
	                    @endif
	                </fieldset>
	                <div class="form-group">
	                	<label for="quantity">Số lượng</label>
	                	<input type="number" name="quantity" min="1" value="1" class="form-control">
	                	@if($errors->has('quantity'))
							<div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
	                    @endif
	                </div>
	                <div class="form-group">
	                	<label for="price">Đơn giá</label>
	                	<input type="text" name="price" placeholder="Nhập đơn giá" class="form-control">
	                	@if($errors->has('price'))
							<div class="alert alert-danger">{{ $errors->first('price') }}</div>
	                    @endif
	                </div>
	                <div class="form-group">
	                	<label for="price">Giá khuyến mại</label>
	                	<input type="text" name="promotional" value="0" placeholder="Nhập giá khuyến mại nếu có" class="form-control">
	                	@if($errors->has('promotional'))
							<div class="alert alert-danger">{{ $errors->first('promotional') }}</div>
	                    @endif
	                </div>
	                <div class="form-group">
	                	<label for="price">Ảnh minh họa</label>
	                	<input type="file" name="image" class="form-control">
	                	@if($errors->has('image'))
							<div class="alert alert-danger">{{ $errors->first('image') }}</div>
	                    @endif
	                </div>
	                <div class="form-group">
	                	<label>Mô tả sản phẩm</label>
	                	<textarea name="description" id="demo" cols="5" rows="5" class="form-control"></textarea>
	                	@if($errors->has('description'))
							<div class="alert alert-danger">{{ $errors->first('description') }}</div>
	                    @endif
	                </div>
	                <div class="form-group">
	                    <label>Danh mục sản phẩm</label>
	                    <select class="form-control cateProduct" name="idCategory">
							@foreach($category as $cate)
	                        	<option value="{{ $cate->id }}">{{ $cate->name }}</option>
	                        @endforeach	
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label>Loại sản phẩm</label>
	                    <select class="form-control proTypeProduct" name="idProductType">
							@foreach($producttype as $pro)
	                        	<option value="{{ $pro->id }}">{{ $pro->name }}</option>
	                        @endforeach	
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label>Status</label>
	                    <select class="form-control" name="status">
	                        <option value="1">Hiển Thị</option>
	                        <option value="0">Không Hiển Thị</option>
	                    </select>
	                </div>
	                <button type="submit" class="btn btn-success">Thêm</button>
	                <button type="reset" class="btn btn-primary">Nhập Lại</button>
	            </form>
	        </div>
	    </div>
	</div>    
@endsection