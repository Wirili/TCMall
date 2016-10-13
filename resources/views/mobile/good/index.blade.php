@extends('mobile.layout')

@section('content')
    <!--头部搜索开始-->
    <div class="search_bg">
        <div class="search_warp">
				<span class="search_z">
					<b><img src="images/searchico.png" onclick="window.location.href='index.php?search='+$(this).parent().next().val()"></b><input type="text" name="search" id="sea" placeholder=" 搜索商品名称"><i><img src="images/closeico.png"></i>
				</span>
            <span class="search_btn"><a href="#">搜索</a></span>
        </div>
    </div>
    <!--头部搜索结束-->
    <!---->
    <div class="menu_ul">
        <li><a><strong style="color: rgb(0, 0, 0);">综合排序</strong><i><img src="images/jtdown.png"></i></a></li>
        <li><a><strong style="color: rgb(0, 0, 0);">销量优先</strong><i><img src="images/jtdown.png"></i></a></li>
        <li><a><strong style="color: rgb(0, 0, 0);">筛选</strong><i><img src="images/jtdown.png"></i></a></li>
        <li><a><img class="list_switch" src="images/list.png"></a></li>
    </div>
    <!---->

    <!--商品列表开始-->
    <div class="pl_list album clearfix">
        <ul>
            @foreach($good as $item)
            <li>
                <div class="warp">
                    <div class="img"><a href="{{URL::route('mobile.good.detail',['id'=>$item->goods_id])}}"><img src="{{$item->cover->img_url or '/build/mobile/images/no_picture.gif'}}" alt=""></a></div>
                    <a href="{{URL::route('mobile.good.detail',['id'=>$item->goods_id])}}" class="top">
                        <p class="title"><strong>{{$item->goods_name}}</strong></p>
                    </a>
                    <div class="bottom">
                        <p class="price"><strong>￥{{$item->shop_price}}</strong><a class="more"><img src="images/more.png" alt=""></a></p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <!--<div id="ma_list">-->
    <!--<ul>-->
    <!---->
    <!--</ul>-->
    <!--</div>-->
    <!--商品列表结束-->

    {{--<!-- 搜索页面开始 -->--}}
    {{--<div id="search" class="dis_n" style="margin-left: 320px;">--}}
        {{--<div class="header">--}}
            {{--<div class="ntd sea_off" style="width:12%;height:50px;">--}}
                {{--<img src="images/lt.png" style="height:32px;margin-top:10px;margin-left:11px">--}}
            {{--</div>--}}
            {{--<div class="ntd" style="width:80%;position:relative;"><input type="text" id="search_sub" placeholder=" 搜索商品名称"></div>--}}
        {{--</div>--}}
        {{--<div class="shangjia">--}}

        {{--</div>--}}
        {{--<div class="shangpin">--}}

        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- 搜索页面结束 -->--}}


    <!-- 滚动加载提示 -->
    <div id="loading" class="loading dis_n">
        <img src="./images/loading.gif">
    </div>
    {{$good->links()}}
    @include('mobile.nav')

    <script class="">

        //列表切换
        $(".list_switch").on('click',function(e){
            if($(this).attr('src')=="images/album.png"){
                $('.pl_list').removeClass('list');
                $('.pl_list').addClass('album');
                $(this).attr('src',"images/list.png");
            }else{
                $('.pl_list').removeClass('album');
                $('.pl_list').addClass('list');
                $(this).attr('src',"images/album.png");
            }
        });
        // 轮播图
        $(".slider").yxMobileSlider({width:320,height:128,during:3000});

        // 选择区域
        $('.city').click(function(){
            $(this).css('background','#efefef').next().removeClass('dis_n').parent().siblings().find('span').css('background','#fff').next().addClass('dis_n');
        });

        // 设置搜索页面
        $('#search').css('margin-left',$(window).width());

        $('#sea').click(function(){
            $('#search').removeClass('dis_n').css('margin-left','0px').siblings().addClass('dis_n_i');
            $('#search_sub').focus();
        });

        // 搜索返回
        $('.sea_off').click(function(){
            $('#search').addClass('dis_n').css('margin-left','320px').siblings().removeClass('dis_n_i');
        });

        // 搜索事件
        document.getElementById('search_sub').addEventListener('input', function(e){
            var val = e.target.value;

            if(val == false){
                $('.shangjia').html('');
                $('.shangpin').html('');
                return;
            }

            search_func(val);
        });

        /*
         $('#search_sub').keyup(function(){
         var val = $(this).val();

         if(val == false){
         $('.shangjia').html('');
         $('.shangpin').html('');
         return;
         }

         search_func(val);
         });
         */

        $('#search_sub').change(function(){
            var val = $(this).val();

            if(val == false){
                $('.shangjia').html('');
                $('.shangpin').html('');
                return;
            }

            search_func(val);
        });

        // 搜索调用事件
        function search_func(val){
            $.ajax({
                type:'post',
                dataType:'json',
                url:'mall.php?m=index&a=search_all',
                data:{search:val},
                success:function(data){
                    /*if(data['shoplist'].length > 0){
                     var html = '';
                     html += '<h3>商家</h3>';
                     html += '<div class="sj_list">';
                     for(var i=0;i<data['shoplist'].length;i++){
                     html += '<a href="index.php?m=shop&shopid='+ data['shoplist'][i].shopid +'">';
                     if(data['shoplist'][i].logo){
                     html += '<img src="'+ data['shoplist'][i].logo +'" />';
                     }else{
                     html += '<img src="./images/logo_none.jpg" />';
                     }
                     html += '</a>';
                     }
                     html += '</div>';
                     html += '<div class="clear"></div>';
                     $('.shangjia').html('').append(html);
                     }else{
                     $('.shangjia').html('<h3>商家</h3><center>没有找到相关的商家</center>');
                     }*/

                    if(data['cailist'].length > 0){
                        var html = '';
                        html += '<h3>商品</h3>';
                        html += '<div style="margin-top:5px">'
                        for(var i=0;i<data['cailist'].length;i++){
                            html += '<a href="mall.php?m=index&a=goods&goodsid='+ data['cailist'][i].id +'">';
                            html += '<div class="sp_list">';
                            html += '<div class="cailogo">';
                            if(data['cailist'][i].thumb_img){
                                html += '<img src="'+ data['cailist'][i].thumb_img +'" />';
                            }else{
                                html += '<img src="./images/none.png" />';
                            }
                            html += '</div>';
                            html += '<div class="caiinfo">';
                            html += '<p class="title">'+ data['cailist'][i].title +'</p>';
                            html += '<p class="des">'+ data['cailist'][i].info +'　</p>';
                            html += '<p class="price">￥'+ data['cailist'][i].payprice +'</p>';
                            html += '</div>';
                            html += '</div>';
                            html += '</a>';
                        }
                        html += '</div>'
                        $('.shangpin').html('').append(html);
                    }else{
                        $('.shangpin').html('<h3>商品</h3><center>没有找到相关的商品</center>');
                    }
                }
            });
        }

        //滚动加载第二页开始
        var scroll_loading = false;
        var page = 2;
        var catid = '';
        var provinceid = '';
        var cityid = '';
        var townid = '';
        var search = '';

        $(window).scroll(function (){
            //document.title = 'x:'+ $(document).scrollTop()+'y:'+ $(window).height()+'z:'+ $(document).height();
            // 滚动到底部自动加载数据
            if ($(document).scrollTop() + $(window).height() >= $(document).height() - 20){

                // 如果已经在加载，则不重复加载
                if (scroll_loading) {
                    return;
                }

                // 开始加载，设置加载标志
                scroll_loading = true;
                $('#loading').attr('style','display:block');

                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:'index.php?page='+page+'&catid='+catid+'&provinceid='+provinceid+'&cityid='+cityid+'&townid='+townid+'&search='+search+'&ajax=ajax',
                    success:function(data){

                        if(data.length > 0){
                            page++;
                            var html = '';
                            for(var i=0;i<data.length;i++){
                                html += '<a href="index.php?m=shop&shopid='+ data[i].shopid +'">';
                                if(data[i].logo){
                                    html += '<img src="'+ data[i].logo +'" />';
                                }else{
                                    html += '<img src="./images/logo_none.jpg" />';
                                }
                                html += '</a>';
                            }

                            $('.pr_list').append(html);

                            // 完成加载，设置加载标志
                            scroll_loading = false;
                            $('#loading').attr('style','display:none');
                        }else{
                            $('#loading').attr('style','display:none');
                        }
                    }
                });
            }
        });
    </script>
@endsection
