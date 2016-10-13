@extends('mobile.layout')

@section('content')
    <!--商品相册 s-->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($gallery as $item)
                <div class="swiper-slide"><img src="{{$item->img_url}}" alt="" style="width:100%;height:100%;display:block;"></div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: true
        });
    </script>
    <!--商品相册 e-->
    <div class="goods_detail_title">
        <ul>
            <li><p>{{$good->goods_name}}</p></li>
            <li><a href="#"><img src="/images/icon_cart.png" alt=""></a></li>
        </ul>
    </div>
    <div class="goods_detail_price">
        <p>￥ {{$good->shop_price}}</p><span>查看折扣等级</span>
    </div>
    <div class="goods_detail_select">
        <p>选择分类</p><span><img src="/images/rt.png" alt=""></span>
    </div>
    <div class="goods_detail_tab">
        <ul class="tab-header">
            <li class="active">
                <a href="#detail"><span>产品详情</span></a>
            </li>
            <li class="line"><img src="/build/mobile/images/center_line.png" alt="" style="display:block;height:40px;width:1px;vertical-align: middle;margin:5px auto 0;"></li>
            <li>
                <a href="#attr"><span>产品参数</span></a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="detail" class="active tab-panel">
                @if($good->goods_desc)
                    {!! $good->goods_desc !!}
                @else
                    <div style="text-align:center;">暂无详情</div>
                @endif
            </div>
            <div id="attr" class="tab-panel"></div>
        </div>
    </div>

    <div class="clearfix" style="height:60px;"></div>
    <div class="goods_detail_nav">
        <ul>
            <li><a href="#"><img src="/images/icon_star.png" alt=""><span>收藏</span></a></li>
            <li><a href="#" style="background-color: #ff9a22;">立即购买</a></li>
            <li><a href="#" style="background-color: #fc6f19;">加入购物车</a></li>
        </ul>
    </div>
    <script>
        //详情切换效果
        $(".goods_detail_tab").on('click','.tab-header li',function(e){
            var cur=e.currentTarget;
            if(!$(cur).hasClass('line')) {
                $.each($('.tab-header li'), function (i, l) {
                    $(l).removeClass('active');
                });
                $(cur).addClass('active');
                var hash = $(cur).children('a')[0].hash;
                $.each($('.tab-panel'), function (i, p) {
                    $(p).removeClass("active");
                });
                $(hash).addClass("active");
            }
            return false;
        })
    </script>
@endsection
