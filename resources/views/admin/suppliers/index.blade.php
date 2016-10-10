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
                            <th class="text-center">@lang('admin/suppliers.suppliers_name')</th>
                            <th class="text-center hidden-xs" width="400">@lang('admin/suppliers.suppliers_desc')</th>
                            <th class="text-center" width="60">@lang('admin/sys.handle')</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(function () {
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
                    url: "{{URL::route('admin.suppliers.ajax',['_token'=>csrf_token()])}}"
                },
                columns: [
                    {data: 'suppliers_id',className:'text-center'},
                    {data: 'suppliers_name'},
                    {
                        data: 'suppliers_desc',
                        className:'hidden-xs',
                    },
                    {
                        data: 'suppliers_id',
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            data = "<a href='/admin/suppliers/edit/" + data + "' data-toggle='tooltip' data-placement='bottom' title='{{ trans('admin/sys.edit') }}' style='padding:0 5px;'><i class='fa fa-edit'></i></a>"
                                    + "<a href='/admin/suppliers/del/" + data + "' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='{{ trans('admin/sys.del') }}' style='padding:0 5px;'><i class='fa fa-remove'></i></a>";
                            return data;
                        }
                    }
                ],
                order: [[0, "desc"]]
            });
            $('#dt_length').append("<a class='btn btn-primary pull-right' href='{{URL::route('admin.suppliers.create')}}'>@lang('admin/suppliers.create')</a>");
        });
    </script>
    @include('admin.footer')
@endsection