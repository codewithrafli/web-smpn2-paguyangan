@push('plugin-styles')
    <link href="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

<div class="overflow-x-auto rounded-2xl border border-bl-border">
    <table id="dataTableExample" class="w-full text-sm">
        <thead>
            <tr class="bg-bl-grey text-left">
                {{ $thead }}
            </tr>
        </thead>
        <tbody>
            {{ $tbody }}
        </tbody>
    </table>
</div>

@push('style')
    <style>
        /* Table full width */
        #dataTableExample { width: 100% !important; }
        #dataTableExample th { padding: 12px 16px; font-weight: 600; font-size: 13px; white-space: nowrap; }
        #dataTableExample td { padding: 12px 16px; border-top: 1px solid #E1E4EB; font-size: 13px; }
        #dataTableExample tbody tr:hover { background: #F6F6F9; }

        /* Bootstrap grid shim for DataTables wrapper */
        .dataTables_wrapper .row {
            display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;
            padding: 10px 16px; gap: 8px; width: 100%;
        }
        .dataTables_wrapper .row > div[class^="col-"] {
            flex: 0 0 auto; width: auto; max-width: 100%;
        }
        .dataTables_wrapper .row > .col-sm-12 { flex: 0 0 100%; width: 100%; }
        .dataTables_wrapper .row > .col-md-6 { flex: 1 1 0; }
        .dataTables_wrapper .row > .col-md-7 { flex: 1 1 0; }
        .dataTables_wrapper .row > .col-md-5 { flex: 1 1 0; }

        /* Search */
        .dataTables_wrapper .dataTables_filter { text-align: right; }
        .dataTables_wrapper .dataTables_filter input { border-radius: 9999px; border: 1px solid #E1E4EB; padding: 8px 16px; outline: none; font-size: 13px; }
        .dataTables_wrapper .dataTables_filter input:focus { box-shadow: 0 0 0 2px #007AFF; border-color: transparent; }

        /* Length */
        .dataTables_wrapper .dataTables_length { font-size: 13px; }
        .dataTables_wrapper .dataTables_length select { border-radius: 9999px; border: 1px solid #E1E4EB; padding: 6px 12px; margin: 0 4px; }

        /* Info */
        .dataTables_wrapper .dataTables_info { font-size: 13px; color: #8F91A2; }

        /* Pagination */
        .dataTables_wrapper .dataTables_paginate { text-align: right; }
        .dataTables_wrapper .dataTables_paginate ul.pagination {
            display: inline-flex !important; flex-wrap: wrap; list-style: none; gap: 4px;
            margin: 0; padding: 0; justify-content: flex-end;
        }
        .dataTables_wrapper .dataTables_paginate ul.pagination .page-item {
            display: inline-block;
        }
        .dataTables_wrapper .dataTables_paginate ul.pagination .page-item .page-link {
            display: inline-block; padding: 6px 14px; border-radius: 9999px; font-size: 13px;
            color: #0F122A; text-decoration: none; border: 1px solid #E1E4EB; cursor: pointer;
            transition: all 0.2s; background: transparent; line-height: 1.4;
        }
        .dataTables_wrapper .dataTables_paginate ul.pagination .page-item .page-link:hover {
            background: #F6F6F9; border-color: #007AFF; color: #007AFF;
        }
        .dataTables_wrapper .dataTables_paginate ul.pagination .page-item.active .page-link {
            background: #007AFF; color: #fff; border-color: #007AFF;
        }
        .dataTables_wrapper .dataTables_paginate ul.pagination .page-item.disabled .page-link {
            color: #C0C2CC; cursor: not-allowed; border-color: #E1E4EB; background: transparent;
        }
    </style>
@endpush

@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/data-table.js') }}"></script>
@endpush
