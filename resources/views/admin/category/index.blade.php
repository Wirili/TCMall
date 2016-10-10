@extends('admin.layout')

@section('content')
    @include('admin.header')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="pull-right mb5">
                            <a class="btn btn-primary" href="{{URL::route('admin.category.create')}}">{{trans('admin/category.create')}}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr align="center">
                                <th class="text-center">{{trans('admin/category.cat_name')}}</th>
                                <th class="text-center">{{trans('admin/category.cat_desc')}}</th>
                                <th class="text-center">{{trans('admin/category.is_show')}}</th>
                                <th class="text-center">{{trans('admin/category.sort_order')}}</th>
                                <th class="text-center" width="100">{{trans('admin/sys.handle')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $item)
                                <tr align="center" class="{{$item['level']}} treechange">
                                    <td class="text-left"><i class="fa fa-minus-square-o" style="margin-left: {{intval($item['level'])*10}}px"></i>{{$item['cat_name']}}</td>
                                    <td>{{$item['cat_desc']}}</td>
                                    <td>
                                        <i class='@if($item['is_show']) fa fa-check text-success @else fa fa-remove text-danger @endif'></i>
                                    </td>
                                    <td>{{$item['sort_order']}}</td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="bottom" title="{{trans('admin/sys.edit')}}" href="{{URL::route('admin.category.edit',['id'=>$item['cat_id']])}}"><i class="fa fa-edit"></i></a>
                                        <a class="text-danger" data-toggle="tooltip" data-placement="bottom" title="{{trans('admin/sys.del')}}" href="{{URL::route('admin.category.del',['id'=>$item['cat_id']])}}"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.treechange').on('click','.fa-minus-square-o',function(a){
                var lvl=parseInt(a.delegateTarget.className);
                $.each($(a.delegateTarget).nextAll(),function(){
                    if(parseInt(this.className)>lvl) {
                        $(this).hide();
                    }else{
                        return false;
                    }
                });
                $(this).removeClass('fa-minus-square-o');
                $(this).addClass('fa-plus-square-o');
            });
            $('.treechange').on('click','.fa-plus-square-o',function(a,b,c){
                var lvl=parseInt(a.delegateTarget.className);
                $.each($(a.delegateTarget).nextAll(),function(){
                    if(parseInt(this.className)>lvl) {
                        $(this).show();
                        var me1=$(this).children('td:eq(0)').children('i');
                        if(me1.hasClass('fa-plus-square-o')){
                            me1.addClass('fa-minus-square-o');
                            me1.removeClass('fa-plus-square-o');
                        }
                    }else {
                        return false;
                    }
                });
                $(this).addClass('fa-minus-square-o');
                $(this).removeClass('fa-plus-square-o');
            });
        });
    </script>
    @include('admin.footer')
@endsection