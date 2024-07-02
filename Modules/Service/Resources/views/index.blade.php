@extends('Admin.layout')

@section('pagetitle', __('trans.sliders'))
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.services.create') }}" class="main-btn">@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('services')" class="btn btn-danger" disabled>@lang('trans.Delete_Selected')</button>
    </div>
</div>
<table class="table table-bordered data-table" id="DataTable">
    <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
            <th>#</th>
            {{-- <th style="text-align:center;">@lang('trans.title_ar')</th>
            <th style="text-align:center;">@lang('trans.title_en')</th> --}}
            <th style="text-align:center;">@lang('trans.file')</th>
            <th style="text-align:center;">@lang('trans.visibility')</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="row_position" data-table="services">

    </tbody>
</table>

@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Destroy existing DataTable instance if it exists
        if ($.fn.DataTable.isDataTable('#DataTable')) {
            $('#DataTable').DataTable().destroy();
        }

        // Initialize DataTable

        var table = $('#DataTable').DataTable({
            processing: true,
            serverSide: true,
            oLanguage: {
                sUrl: '{{ DT_Lang() }}'
            },
            createdRow: function(row, data, dataIndex) {
                $(row).attr('data-position', data.arrangement);
                $(row).attr('data-id', data.id);
                $(row).attr('id', data.id);
            },
            ajax: "{{ route('admin.services.index') }}",
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        stripHtml: false,
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            columns: [{
                    data: 'checkbox',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                // {
                //     data: 'title_ar',
                //     name: 'title_ar'
                // },
                //  {
                //     data: 'title_en',
                //     name: 'title_en'
                // },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'status',
                    name: 'status'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });

    });
</script>
@stop
