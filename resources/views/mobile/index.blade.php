@extends('mobile.layout')

@section('content')
<!--商品相册 s-->
<div class="swiper-container">
    <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="\build\mobile\images\home_top.jpg" alt="" style="width:100%;height:100%;"></div>
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
<ul class="pl-list">
    <li><img src="\build\mobile\images\i1.jpg" alt=""></li>
    <li><img src="\build\mobile\images\shop1.jpg" alt=""></li>
    <li><img src="\build\mobile\images\goods_head.jpg" alt=""></li>
    <li><a href="{{URL::route('mobile.good.detail',['id'=>1])}}"><img src="\build\mobile\images\goods_1.jpg" alt=""></a></li>
    <li><a href="#"><img src="\build\mobile\images\goods_2.jpg" alt=""></a></li>
    <li><a href="#"><img src="\build\mobile\images\goods_3.jpg" alt=""></a></li>
</ul>
    @include('mobile.nav')
@endsection
