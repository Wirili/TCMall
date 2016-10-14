@extends('mobile.layout')

@section('content')
    <div class="my_address">
        <ul>
            <li>
                <div class="top">
                    <p>收货人：某某人<strong>15812345678</strong></p>
                    <p class="addr">收货地址：广东省汕头市澄海区广东省汕头市澄海区 广东省 汕头市 澄海区</p>
                    <span><i class="icon-right"></i></span>
                </div>
                <div class="bottom">
                    <div class="input_checkbox1" style="display:inline;"><input class="addr_checked" type="checkbox" id="skuid_1" checked=""><label for="skuid_1"></label></div>
                    <label for="skuid_1"><strong>设置默认地址</strong></label>
                    <span>
						<a href="">编辑</a>&nbsp;&nbsp;
						<a href="">删除</a>
					</span>
                </div>
            </li>
            <li>
                <div class="top">
                    <p>收货人：某某人<strong>15812345678</strong></p>
                    <p class="addr">收货地址：广东省汕头市澄海区广东省汕头市澄海区 广东省 汕头市 澄海区</p>
                    <span><i class="icon-right"></i></span>
                </div>
                <div class="bottom">
                    <div class="input_checkbox1" style="display:inline;"><input class="addr_checked" type="checkbox" id="skuid_2"><label for="skuid_2"></label></div>
                    <label for="skuid_2"><strong>设置默认地址</strong></label>
                    <span>
						<a href="">编辑</a>&nbsp;&nbsp;
						<a href="">删除</a>
					</span>
                </div>
            </li>
            <li>
                <div class="top">
                    <p>收货人：某某人<strong>15812345678</strong></p>
                    <p class="addr">收货地址：广东省汕头市澄海区广东省汕头市澄海区 广东省 汕头市 澄海区</p>
                    <span><i class="icon-right"></i></span>
                </div>
                <div class="bottom">
                    <div class="input_checkbox1" style="display:inline;"><input class="addr_checked" type="checkbox" id="skuid_3"><label for="skuid_3"></label></div>
                    <label for="skuid_3"><strong>设置默认地址</strong></label>
                    <span>
						<a href="">编辑</a>&nbsp;&nbsp;
						<a href="">删除</a>
					</span>
                </div>
            </li>
            <li>
                <div class="top">
                    <p>收货人：某某人<strong>15812345678</strong></p>
                    <p class="addr">收货地址：广东省汕头市澄海区广东省汕头市澄海区 广东省 汕头市 澄海区</p>
                    <span><i class="icon-right"></i></span>
                </div>
                <div class="bottom">
                    <div class="input_checkbox1" style="display:inline;"><input class="addr_checked" type="checkbox" id="skuid_4"><label for="skuid_4"></label></div>
                    <label for="skuid_4"><strong>设置默认地址</strong></label>
                    <span>
						<a href="">编辑</a>&nbsp;&nbsp;
						<a href="">删除</a>
					</span>
                </div>
            </li>
            <li>
                <div class="top">
                    <p>收货人：某某人<strong>15812345678</strong></p>
                    <p class="addr">收货地址：广东省汕头市澄海区广东省汕头市澄海区 广东省 汕头市 澄海区</p>
                    <span><i class="icon-right"></i></span>
                </div>
                <div class="bottom">
                    <div class="input_checkbox1" style="display:inline;"><input class="addr_checked" type="checkbox" id="skuid_5"><label for="skuid_5"></label></div>
                    <label for="skuid_5"><strong>设置默认地址</strong></label>
                    <span>
						<a href="">编辑</a>&nbsp;&nbsp;
						<a href="">删除</a>
					</span>
                </div>
            </li>
            <li>
                <div class="top">
                    <p>收货人：某某人<strong>15812345678</strong></p>
                    <p class="addr">收货地址：广东省汕头市澄海区广东省汕头市澄海区 广东省 汕头市 澄海区</p>
                    <span><i class="icon-right"></i></span>
                </div>
                <div class="bottom">
                    <div class="input_checkbox1" style="display:inline;"><input class="addr_checked" type="checkbox" id="skuid_6"><label for="skuid_6"></label></div>
                    <label for="skuid_6"><strong>设置默认地址</strong></label>
                    <span>
						<a href="">编辑</a>&nbsp;&nbsp;
						<a href="">删除</a>
					</span>
                </div>
            </li>
        </ul>
    </div>
    <div class="clearfix" style="height:56px;"></div>
    <a href="#" class="my_address_nav">新增收货地址</a>
    <script>
        $('.addr_checked').on('click',function(e){
            $.each($('.addr_checked'),function(i,g){
                if(e.currentTarget!=g)
                    $(g).removeAttr('checked');
            })
        });
    </script>
@endsection
