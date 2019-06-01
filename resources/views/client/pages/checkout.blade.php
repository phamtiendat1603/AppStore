@extends('client.layouts.master')

@section('title')
	Đặt Hàng
@endsection

@section('content')
    <div class="page-head_agile_info_w3l">
    </div>
    <!-- //banner-2 -->
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="/">Trang Chủ</a>
                        <i>|</i>
                    </li>
                    <li>Đặt Hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <br/>
	<div class="row">
        <div class="col-sm-8">
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <h5 style="float: left;"><i class="fas fa-map-marker-alt"></i> Địa chỉ nhận hàng</h5>
                        <a href="#address" style="float: right;" data-toggle="modal">Thay đổi >></a>
                        <div class="checkbox" style=" clear: both;">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <p>Phạm Tiến Đạt | 08853458641</p>
                                    <p>Hà Nội</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);margin-top: 10px;">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <h5><i class="far fa-truck"></i> Phương thức vận chuyển</h5>
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <input type="checkbox" class="checkbox" checked style="float: left;">
                                    <span style="float: left;">
                                        Chuyển phát tiêu chuẩn
                                        <p>Dự kiến giao hàng sau 3-4 ngày</p>
                                    </span>
                                    <span style="float: right; margin-left: 240px;">{{ number_format('200000') }} VNĐ</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193);">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <h5 style="text-align: center;"><i class="fas fa-shopping-cart"></i> Thông tin đơn hàng</h5>
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <p style="float: left;">Tổng Tiền</p>
                                    <p style="margin-left: 10px;float: left;">200000</p>
                                </label>
                                <label class="anim">
                                    <p style="float: left;">Phí vận chuyển</p>
                                    <p style="margin-left: 10px;float: left;">200000</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px;">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <h5 class="modal-title text-center"><i class="fas fa-comments"></i> Ghi Chú</h5>
                                    <div class="form-group">
                                        <textarea style="width: 247px;" placeholder="Bạn có nhắn gì tới shop không?" rows="4" maxlength="1000"></textarea>
                                    </div>
                                    
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="resp-tabs-container hor_1" style="border-color: rgb(193, 193, 193); margin-top: 10px;">
                <div class="resp-tab-content hor_1 resp-tab-content-active" aria-labelledby="hor_1_tab_item-0" style="display:block">
                    <div class="vertical_post check_box_agile">
                        <div class="checkbox">
                            <div class="check_box_one cashon_delivery">
                                <label class="anim">
                                    <p style="float: left;">Tổng thanh toán</p>
                                    <p style="margin-left: 10px;float: left;">22222</p>
                                </label>
                                <label class="anim">
                                    <button class="btn submit check_out">Tiến hành thanh toán</button>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Thay đổi địa chỉ giao hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ Email</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ email" name="email">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ nhận hàng" name="address">
                        </div>
                        <div class="right-w3l">
                            <button class="btn btn-primary form-control">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection