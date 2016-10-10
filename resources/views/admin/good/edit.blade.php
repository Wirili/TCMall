@extends('admin.layout')

@section('content')
    @include('admin.header')
    <div class="content">
        <form class="form-horizontal" role="form" method="POST" action="{{URL::route('admin.good.save')}}" enctype="multipart/form-data">
            <div class="nav-tabs-custom">
            {!! csrf_field() !!}
            <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_main" aria-controls="tab_main" role="tab" data-toggle="tab">@lang('admin/good.tab_basic')</a></li>
                    <li role="presentation"><a href="#tab_desc" aria-controls="tab_desc" role="tab" data-toggle="tab">@lang('admin/good.tab_desc')</a></li>
                    <li role="presentation"><a href="#tab_other" aria-controls="tab_other" role="tab" data-toggle="tab">@lang('admin/good.tab_other')</a></li>
                    <li role="presentation"><a href="#tab_gallery" aria-controls="tab_gallery" role="tab" data-toggle="tab">@lang('admin/good.tab_gallery')</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" style="margin-top:8px;">
                    <div role="tabpanel" class="tab-pane active" id="tab_main">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="goods_name">@lang('admin/good.goods_name')</label>
                            <div class="col-md-4"><input type="text" class="form-control input-sm" name="goods_name" id="goods_name" value="{{$goods->goods_name}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="goods_sn">@lang('admin/good.goods_sn')</label>
                            <div class="col-md-4"><input type="text" class="form-control input-sm" name="goods_sn" id="goods_sn" value="{{$goods->goods_sn}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="goods_sn">@lang('admin/good.goods_barcode')</label>
                            <div class="col-md-4"><input type="text" class="form-control input-sm" name="goods_barcode" id="goods_barcode" value="{{$goods->goods_barcode}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="brand_id">@lang('admin/good.goods_cat')</label>
                            <div class="col-md-4">
                                <select class="form-control input-sm select2" name="cat_id">
                                    <option value="0">@lang('admin/good.pls')</option>
                                    @foreach($category as $item)
                                        <option value="{{$item->cat_id}}" @if($item->cat_id==$goods->cat_id) selected @endif>{{$item->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="brand_id">@lang('admin/good.goods_brand')</label>
                            <div class="col-md-4">
                                <select class="form-control input-sm select2" name="brand_id">
                                    <option value="0">@lang('admin/good.pls')</option>
                                    @foreach($brands as $item)
                                        <option value="{{$item->brand_id}}" @if($item->brand_id==$goods->brand_id) selected @endif>{{$item->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="brand_id">@lang('admin/good.suppliers')</label>
                            <div class="col-md-4">
                                <select class="form-control input-sm select2" name="suppliers_id">
                                    <option value="0">@lang('admin/good.pls')</option>
                                    @foreach($suppliers as $item)
                                        <option value="{{$item->suppliers_id}}" @if($item->suppliers_id==$goods->suppliers_id) selected @endif>{{$item->suppliers_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="shop_price">@lang('admin/good.shop_price')</label>
                            <div class="col-md-2"><input type="text" class="form-control input-sm" name="shop_price" id="shop_price" value="{{$goods->shop_price}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="market_price">@lang('admin/good.market_price')</label>
                            <div class="col-md-2"><input type="text" class="form-control input-sm" name="market_price" id="market_price" value="{{$goods->market_price}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><input type="checkbox" name="is_promote"> @lang('admin/good.promote_price')</label>
                            <div class="col-md-2"><input type="text" class="form-control input-sm" name="promote_price" id="promote_price" value="{{$goods->promote_price}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="promote_date">@lang('admin/good.promote_date')</label>
                            <div class="col-md-10 form-inline">
                                <input type="text" class="form-control input-sm select_date" data-picker-position="top-left" name="promote_date_start" id="promote_date_start" value="">
                                -
                                <input type="text" class="form-control input-sm select_date" data-picker-position="top-left" name="promote_date_end" id="promote_date_end" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><input type="checkbox" name="is_xiangou"> @lang('admin/good.xiangou_num')</label>
                            <div class="col-md-2"><input type="text" class="form-control input-sm" name="xiangou_num" id="xiangou_num" value="{{$goods->xiangou_num}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="xiangou_date">@lang('admin/good.xiangou_date')</label>
                            <div class="col-md-10 form-inline">
                                <input type="text" class="form-control input-sm select_date" data-picker-position="top-left" name="xiangou_start_date" id="xiangou_start_date" value="">
                                -
                                <input type="text" class="form-control input-sm select_date" data-picker-position="top-left" name="xiangou_end_date" id="xiangou_end_date" value="">
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab_desc">
                        <!-- 加载编辑器的容器 -->
                        <script id="goods_desc" name="goods_desc" style="height: 400px; padding: 8px 0;" type="text/plain">{!! $goods->goods_desc !!}</script>

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('goods_desc');
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                            });
                        </script>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab_other">
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('admin/good.goods_weight')</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-sm" name="goods_weight" id="goods_weight" value="{{$goods->goods_weight}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('admin/good.goods_number')</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-sm" name="goods_number" id="goods_number" value="{{$goods->goods_number}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('admin/good.warn_number')</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-sm" name="warn_number" id="warn_number" value="{{$goods->warn_number}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('admin/good.recommend')</label>
                            <div class="col-md-4">
                                <label class="checkbox-inline"><input type="checkbox" name="is_hot" id="is_hot" @if($goods->is_hot==1) checked @endif value="1">@lang('admin/good.is_hot')&nbsp;</label>
                                <label class="checkbox-inline"><input type="checkbox" name="is_new" id="is_new" @if($goods->is_new==1) checked @endif value="1">@lang('admin/good.is_new')&nbsp;</label>
                                <label class="checkbox-inline"><input type="checkbox" name="is_best" id="is_best" @if($goods->is_best==1) checked @endif value="1">@lang('admin/good.is_best')</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('admin/good.is_on_sale')</label>
                            <div class="col-md-4">
                                <label class="checkbox-inline"><input type="checkbox" name="is_on_sale" id="is_on_sale" @if($goods->is_on_sale==1) checked @endif value="1">@lang('admin/good.is_on_sale_help')</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('admin/good.is_alone_sale')</label>
                            <div class="col-md-4">
                                <label class="checkbox-inline"><input type="checkbox" name="is_alone_sale" id="is_alone_sale" @if($goods->is_alone_sale==1) checked @endif value="1">@lang('admin/good.is_alone_sale_help')</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('admin/good.is_shipping')</label>
                            <div class="col-md-4">
                                <label class="checkbox-inline"><input type="checkbox" name="is_shipping" id="is_shipping" @if($goods->is_shipping==1) checked @endif value="1">@lang('admin/good.is_shipping_help')</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="keywords">@lang('admin/good.keywords')</label>
                            <div class="col-md-4"><input type="text" class="form-control input-sm" name="keywords" id="keywords" value="{{$goods->keywords}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="goods_brief">@lang('admin/good.goods_brief')</label>
                            <div class="col-md-4"><textarea class="form-control input-sm" rows="3" name="goods_brief" id="goods_brief" value="{{$goods->goods_brief}}"></textarea></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="goods_brief">@lang('admin/good.seller_note')</label>
                            <div class="col-md-4"><textarea class="form-control input-sm" rows="3" name="seller_note" id="seller_note" value="{{$goods->seller_note}}"></textarea></div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab_gallery">
                        <div class="row">
                            @foreach($goods->gallery as $item)
                                <div class="file-preview-frame" data-imgid="{{$item->img_id}}">
                                    <div class="kv-file-content">
                                        <img src="{{$item->thumb_url}}" alt="{{$item->img_desc}}" style="width:auto;height:160px;">
                                    </div>
                                    <div class="file-thumbnail-footer">
                                        <div class="file-actions">
                                            <div class="file-footer-buttons">
                                                <button type="button" class="file-remove btn btn-xs btn-default" title="删除文件"><i class="glyphicon glyphicon-trash text-danger"></i></button>
                                                <button type="button" class="file-covers btn btn-xs btn-default" title="设置封面"><i class="glyphicon glyphicon-bookmark @if($goods->img_id==$item->img_id) text-primary @endif"></i></button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <input id="img_id" type="hidden" name="img_id" value="{{$goods->img_id}}">
                            <input id="img_id_del" type="hidden" name="img_id_del" value="">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">选择图片</label>
                                <input id="upload_img" name="upload_img[]" type="file" multiple class="file-loading">
                                <script>
                                    $(document).on('ready', function() {
                                        $("#upload_img").fileinput({
                                            language:'zh',
                                            showCaption: false,
                                            showUpload:false
                                        });
                                        $("div[data-imgid]").on('click','.file-covers',function(btn){
                                            $("div[data-imgid] .file-covers i").each(function(e){
                                                $(this).removeClass('text-primary');
                                            });
                                            $(this).find('i').addClass('text-primary');
                                            debugger;
                                            $('#img_id').val($(btn.delegateTarget).data('imgid'));
                                        });

                                        $("div[data-imgid]").on('click','.file-remove',function(btn){
                                            debugger;
                                            var del=$('#img_id_del').val();
                                            $.trim(del)==''?del=[]:del=del.split(',');
                                            del.push($(btn.delegateTarget).data('imgid'));
                                            $('#img_id_del').val(del.toString());
                                            $(btn.delegateTarget).remove();
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                    <input type="hidden" name="goods_id" value="{{$goods->goods_id}}">
                    <input type="submit" class="btn btn-primary" value="@lang('admin/sys.submit')">
                    <input type="reset" class="btn btn-default" value="@lang('admin/sys.reset')">
                </div>
            </div>
        </form>
    </div>
    @include('admin.footer')
@endsection