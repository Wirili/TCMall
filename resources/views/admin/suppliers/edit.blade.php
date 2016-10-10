@extends('admin.layout')

@section('content')
    @include('admin.header')
    <div class="content">
        <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.suppliers.save') }}" enctype="multipart/form-data">
            <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_main" aria-controls="tab_main" role="tab" data-toggle="tab">@lang('admin/suppliers.tab_basic')</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" style="margin-top: 8px;">
                    <div role="tabpanel" class="tab-pane active" id="tab_main">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="suppliers_name">@lang('admin/suppliers.suppliers_name')</label>
                            <div class="col-md-4"><input type="text" class="form-control input-sm" name="suppliers_name" id="suppliers_name" value="{{$brand->suppliers_name}}"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="suppliers_desc">@lang('admin/suppliers.suppliers_desc')</label>
                            <div class="col-md-4"><textarea rows="3" class="form-control input-sm" name="suppliers_desc" id="suppliers_desc" >{{$brand->suppliers_desc}}</textarea></div>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                    <input type="hidden" name="suppliers_id" value="{{$brand->suppliers_id}}">
                    <input type="submit" class="btn btn-primary" value="@lang('admin/sys.submit')">
                    <input type="reset" class="btn btn-default" value="@lang('admin/sys.reset')">
                </div>
            </div>
        </form>
    </div>
    @include('admin.footer')
@endsection