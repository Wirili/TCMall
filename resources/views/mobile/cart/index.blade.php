@extends('mobile.layout')

@section('content')
    @include('mobile.toolbar')
    <div class="car_list">
        <ul>
            <li>
                <div class="input_checkbox"><input type="checkbox" id="skuid_1"><label for="skuid_1"></label></div>
                <div class="img"><img src="/build/mobile/images/goods.jpg" alt=""></div>
                <div class="desc">
                    <p class="desc_t">adfdf</p>
                    <p class="desc_p"><strong class="price">￥ 0.00</strong><del>￥ 0.00</del></p>
                    <p class="desc_b">
					<span class="minus_add">
						<a href="javascript:void(0);"><i class="fa fa-minus"></i></a>
						<input type="text" size="3" readonly="readonly">
						<a href="javascript:void(0);"><i class="fa fa-plus"></i></a>
					</span>
                        <a href="#"><i class="icon-delete"></i></a>
                    </p>
                </div>
            </li>
        </ul>
    </div>
    <div class="clearfix" style="height:60px;"></div>
    <div class="car_nav">
        <ul>
            <li><a href="#"><div class="input_checkbox"><input type="checkbox" id="total"><label for="total"></label></div><label for="total">全选</label></a></li>
            <li>
                <a href="javascript:void(0);">
                    <p>总计:<strong class="price" >￥ 0.00</strong></p>
                    <p>不含运费</p>
                </a>
            </li>
            <li><a href="#" style="background-color: #ff4d00;">去结算(0)</a></li>
        </ul>
    </div>
@endsection
