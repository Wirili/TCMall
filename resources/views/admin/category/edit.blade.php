@extends('admin.layout')

@section('content')
    @include('admin.header')
    <div class="content">
        <div class="box box-info">
            <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.category.save') }}"  enctype="multipart/form-data">
                <div class="box-body">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="cat_name">@lang('admin/category.cat_name')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="cat_name" id="cat_name" value="{{$category->cat_name}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="parent_id">@lang('admin/category.parent')</label>
                        <div class="col-md-4">
                            <select id="parent_id" class="form-control input-sm select2" name="parent_id">
                                <option value="0">@lang('admin/category.topcat')</option>
                                @foreach($cat as $item)
                                    <option value="{{$item->cat_id}}" @if($item->cat_id==$category->parent_id) selected @endif>{{$item->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="show_img_upload">{{trans('admin/category.show_img')}}</label>
                        <div class="col-md-3"><input type="file" class="input-sm" name="show_img_upload" id="show_img_upload"></div>
                        @if($category->show_img)
                            <div class="col-md-1"><i class="fa fa-picture-o fa-lg input-sm" data-toggle="popover" data-trigger="hover" data-content='<img src="{{$category->show_img}}" width="500">'></i></div>
                            <script>
                                $('[data-toggle="popover"]').popover({html:true});
                            </script>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="is_show">@lang('admin/category.is_show')</label>
                        <div class="col-md-4"><input class="checkbox" type="checkbox" name="is_show" id="is_show" @if($category->is_show==1) checked @endif value="1"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="show_in_nav">@lang('admin/category.show_in_nav')</label>
                        <div class="col-md-4"><input class="checkbox" type="checkbox" name="show_in_nav" id="show_in_nav" @if($category->show_in_nav==1) checked @endif value="1"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="sort_order">@lang('admin/category.sort_order')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="sort_order" id="sort_order" value="{{$category->sort_order}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="keywords">@lang('admin/category.keywords')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="keywords" id="keywords" value="{{$category->keywords}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="cat_desc">@lang('admin/category.cat_desc')</label>
                        <div class="col-md-4"><textarea class="form-control input-sm" rows="3" name="cat_desc" id="cat_desc">{{$category->cat_desc}}</textarea></div>
                    </div>
                    </div>
                    <div class="box-footer text-center">
                        <input type="hidden" name="cat_id" value="{{$category->cat_id}}">
                        <input type="submit" class="btn btn-primary" value="@lang('admin/sys.submit')">
                        <input type="reset" class="btn btn-default" value="@lang('admin/sys.reset')">
                    </div>
            </form>
        </div>
    </div>
@include('admin.footer')
@endsection