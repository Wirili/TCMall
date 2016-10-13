@extends('mobile.layout')

@section('content')
    <div style="background:url(/build/mobile/images/mya3.jpg) no-repeat 0px 0px / 100% 167px">
        <div style="text-align:center; width:100%;line-height:20px;line-height:20px;"><img src="/build/mobile/images/mya2.png" style="width:80px;padding-top:30px;"></div>
        <div style="text-align:center; width:100%;line-height:20px;font-size:18px;font-weight:bold;color:#444;padding-bottom:20px;">张三</div>
    </div>
    <div class="my-menu-ul clearfix">
        <ul>
            <li>
                <a href="#">
                    <p>10</p>
                    <span>我的收藏</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <p>10</p>
                    <span>浏览记录</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="my-order clearfix">
        <header>
            <a href="#">
                <span class="mtd1"><img src="/images/icon_order.png" height="30"></span>
                <span class="mtd2">我的订单</span>
                <span class="mtd3">查看全部订单<img src="/images/rt.png" height="20"></span>
            </a>
        </header>
        <ul>
            <li><a href="#"><img src="/images/icon_unpay.png" alt=""><span>待付款</span></a></li>
            <li><a href="#"><img src="/images/icon_unshop.png" alt=""><span>待发货</span></a></li>
            <li><a href="#"><img src="/images/icon_receiving.png" alt=""><span>待收货</span></a></li>
            <li><a href="#"><img src="/images/icon_order_back.png" alt=""><span>退换货/款</span></a></li>
        </ul>
    </div>

    <div class="my">
        <ul>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><img src="images/icon_userinfo.png" height="30"></span>
                    <span class="mtd2">个人资料</span>
                    <span class="mtd3"><img src="images/rt.png" height="20"></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><img src="images/icon_setting.png" height="30"></span>
                    <span class="mtd2">功能设置</span>
                    <span class="mtd3"><img src="images/rt.png" height="20"></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><img src="images/icon_password.png" height="30"></span>
                    <span class="mtd2">修改密码</span>
                    <span class="mtd3"><img src="images/rt.png" height="20"></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><img src="images/icon_address.png" height="30"></span>
                    <span class="mtd2">收货地址</span>
                    <span class="mtd3"><img src="images/rt.png" height="20"></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><img src="images/icon_feed.png" height="30"></span>
                    <span class="mtd2">意见反馈</span>
                    <span class="mtd3"><img src="images/rt.png" height="20"></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=tower_detail">
                    <span class="mtd1"><img src="images/icon_upgrade.png" height="30"></span>
                    <span class="mtd2">职位晋级赛</span>
                    <span class="mtd3">蓝领会员<img src="images/rt.png" height="20"></span>
                </a>
            </li>
            <li>
                <span class="mtd1"><img src="images/icon_tel.png" height="30"></span>
                <span class="mtd2">服务热线&nbsp;400-101-5538</span>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=logout">
                    <span class="mtd1"><img src="images/my5.png" height="30"></span>
                    <span class="mtd2">退出登录</span>
                    <span class="mtd3"><img src="images/rt.png" height="20"></span>
                </a>
            </li>
        </ul>
    </div>
    @include('mobile.nav')
@endsection
