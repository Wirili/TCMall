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
                <span class="mtd1"><i class="icon-my-order" style="color:#f6633f;"></i> 我的订单</span>
                <span class="mtd2">查看全部订单 <i class="icon-right"></i></span>
            </a>
        </header>
        <ul>
            <li><a href="#"><i class="icon-my-pay"></i><span>待付款</span><em>0</em></a></li>
            <li><a href="#"><i class="icon-my-ship"></i><span>待发货</span></a></li>
            <li><a href="#"><i class="icon-my-rejected"></i><span>待收货</span></a></li>
            <li><a href="#"><i class="icon-my-return"></i><span>退换货/款</span></a></li>
        </ul>
    </div>

    <div class="my">
        <ul>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><i class="icon-my-userinfo" style="color:#a6dd5e;"></i> 个人资料</span>
                    <span class="mtd2"><i class="icon-right"></i></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><i class="icon-my-setting" style="color:#f7c584;"></i> 功能设置</span>
                    <span class="mtd2"><i class="icon-right"></i></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><i class="icon-my-password" style="color:#2dcde5;"></i> 修改密码</span>
                    <span class="mtd2"><i class="icon-right"></i></span>
                </a>
            </li>
            <li>
                <a href="{{URL::route('mobile.user.address')}}">
                    <span class="mtd1"><i class="icon-my-address" style="color:#97a1fc;"></i> 收货地址</span>
                    <span class="mtd2"><i class="icon-right"></i></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=history">
                    <span class="mtd1"><i class="icon-my-feed" style="color:#fa5cc8;"></i> 意见反馈</span>
                    <span class="mtd2"><i class="icon-right"></i></span>
                </a>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=tower_detail">
                    <span class="mtd1"><i class="icon-my-tie" style="color:#212121;"></i> 职位晋级赛</span>
                    <span class="mtd2">蓝领会员 <i class="icon-right"></i></span>
                </a>
            </li>
            <li>
                <span class="mtd1"><i class="icon-my-phone" style="color:#ff3750;"></i> 服务热线&nbsp;400-101-5538</span>
                <span class="mtd2"><i class="icon-right"></i></span>
            </li>
            <li>
                <a href="index.php?m=my&amp;a=logout">
                    <span class="mtd1"><i class="icon-my-phone" style="color:#f6633f;"></i> 退出登录</span>
                    <span class="mtd2"><i class="icon-right"></i></span>
                </a>
            </li>
        </ul>
    </div>
    @include('mobile.nav')
@endsection
