@extends('admin.layout')

@section('content')
@include('admin.header')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr align="center">
                                    <th class="text-center" width="40">@lang('admin/sys.id')</th>
                                    <th class="text-center">@lang('admin/brand.brand_name')</th>
                                    <th class="text-center hidden-xs" width="60">@lang('admin/brand.is_show')</th>
                                    <th class="text-center hidden-xs" width="60">@lang('admin/brand.sort_order')</th>
                                    <th class="text-center hidden-xs" width="60">@lang('admin/sys.add_time')</th>
                                    <th class="text-center" width="60">@lang('admin/sys.handle')</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#dt').on('click','[data-id]',function(e){
                $.ajax({
                    type:'post',
                    url:'{{URL::route('admin.brand.toggle_show')}}',
                    data:{
                        id:$(e.currentTarget).data('id'),
                        _token:'{{csrf_token()}}'
                    },
                    success:function(result){
                        if(result.error>0){
                            alert(result.msg);
                        }else{
                            if(e.currentTarget.className=="fa fa-remove text-danger")
                                e.currentTarget.className="fa fa-check text-success";
                            else
                                e.currentTarget.className="fa fa-remove text-danger";
                        }
                    }
                });
            });

            $('#dt').on('draw.dt',function(e, settings){
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
                    url: "{{URL::route('admin.brand.ajax',['_token'=>csrf_token()])}}"
                },
                columns: [
                    {data: 'brand_id',className:'text-center'},
                    {data: 'brand_name'},
                    {
                        data: 'is_show',
                        className: 'text-center hidden-xs',
                        render:function(data,type,row){
                            if(data==1){
                                data="<i class='fa fa-check text-success' data-id='"+row.brand_id+"'></i>";
                            }else{
                                data="<i class='fa fa-remove text-danger' data-id='"+row.brand_id+"'></i>";
                            }
                            return data;
                        }
                    },
                    {
                        data: 'sort_order',
                        className:'hidden-xs',
                    },
                    {
                        data: 'add_time_format',
                        className:'hidden-xs'
                    },
                    {
                        data: 'brand_id',
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            data = "<a href='/admin/brand/edit/" + data + "' data-toggle='tooltip' data-placement='bottom' title='{{ trans('admin/sys.edit') }}' style='padding:0 5px;'><i class='fa fa-edit'></i></a>"
                                    + "<a href='/admin/brand/del/" + data + "' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='{{ trans('admin/sys.del') }}' style='padding:0 5px;'><i class='fa fa-remove'></i></a>";
                            return data;
                        }
                    }
                ],
                order: [[0, "desc"]]
            });
            $('#dt_length').append("<a class='btn btn-primary pull-right' href='{{URL::route('admin.brand.create')}}'>@lang('admin/brand.create')</a>");
        });
    </script>
    @include('admin.footer')
@endsection