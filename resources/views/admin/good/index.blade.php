@extends('admin.layout')

@section('content')
@include('admin.header')
    <div class="content">
        <div class="box box-info">
            <div class="box-body">
                <table id="dt" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr align="center">
                            <th class="text-center" width="40">@lang('admin/sys.id')</th>
                            <th class="text-center">@lang('admin/good.goods_name')</th>
                            <th class="text-center hidden-xs" width="80">@lang('admin/good.goods_sn')</th>
                            <th class="text-center hidden-xs" width="60">@lang('admin/good.shop_price')</th>
                            <th class="text-center hidden-xs" width="30">@lang('admin/good.is_on_sale')</th>
                            <th class="text-center hidden-xs" width="30">@lang('admin/good.is_hot')</th>
                            <th class="text-center hidden-xs" width="30">@lang('admin/good.is_new')</th>
                            <th class="text-center hidden-xs" width="30">@lang('admin/good.is_best')</th>
                            <th class="text-center hidden-xs" width="60">@lang('admin/sys.add_time')</th>
                            <th class="text-center" width="60">@lang('admin/sys.handle')</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            var table = $('#dt').on('draw.dt',function(e, settings){
                $('[data-toggle="tooltip"]').tooltip();
            })
            .DataTable({
                dom:"<'row'<'col-sm-12'l>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
                pagingType: "full_numbers",
                pageLength: 10,
                autoWidth: false,
                processing: true,
                serverSide: true,
                lengthChange: true,
                searching: false,
                stateSave: true,
                ajax: {
                    type:'POST',
                    url: "{{URL::route('admin.good.ajax',['_token'=>csrf_token()])}}"
                },
                columns: [
                    {data: 'goods_id',className:'text-center'},
                    {data: 'goods_name'},
                    {
                        data: 'goods_sn',
                        className:'hidden-xs',
                    },
                    {
                        data: 'shop_price',
                        className: 'text-right hidden-xs',
                    },
                    {
                        data: 'is_on_sale',
                        className: 'text-center hidden-xs',
                        render:function(data,type,row){
                            if(data==1){
                                data="<i class='fa fa-check text-success'></i>";
                            }else{
                                data="<i class='fa fa-remove text-danger'></i>"
                            }
                            return data;
                        }
                    },
                    {
                        data: 'is_hot',
                        className: 'text-center hidden-xs',
                        render:function(data,type,row){
                            if(data==1){
                                data="<i class='fa fa-check text-success'></i>";
                            }else{
                                data="<i class='fa fa-remove text-danger'></i>"
                            }
                            return data;
                        }
                    },
                    {
                        data: 'is_new',
                        className: 'text-center hidden-xs',
                        render:function(data,type,row){
                            if(data==1){
                                data="<i class='fa fa-check text-success'></i>";
                            }else{
                                data="<i class='fa fa-remove text-danger'></i>"
                            }
                            return data;
                        }
                    },
                    {
                        data: 'is_best',
                        className: 'text-center hidden-xs',
                        render:function(data,type,row){
                            if(data==1){
                                data="<i class='fa fa-check text-success'></i>";
                            }else{
                                data="<i class='fa fa-remove text-danger'></i>"
                            }
                            return data;
                        }
                    },
                    {
                        data: 'add_time_format',
                        className:'hidden-xs'
                    },
                    {
                        data: 'goods_id',
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            data = "<a href='/admin/good/edit/" + data + "' data-toggle='tooltip' data-placement='bottom' title='{{ trans('admin/sys.edit') }}' style='padding:0 5px;'><i class='fa fa-edit'></i></a>"
                                    + "<a href='/admin/good/del/" + data + "' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='{{ trans('admin/sys.del') }}' style='padding:0 5px;'><i class='fa fa-remove'></i></a>";
                            return data;
                        }
                    }
                ],
                order: [[0, "desc"]]
            });
            $('#dt_length').append("<a class='btn btn-primary pull-right' href='{{URL::route('admin.good.create')}}'>@lang('admin/good.create')</a>");
        });
    </script>
    @include('admin.footer')
@endsection