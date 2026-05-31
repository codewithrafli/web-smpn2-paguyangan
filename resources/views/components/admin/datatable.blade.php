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
        #dataTableExample th { padding: 12px 16px; font-weight: 600; font-size: 13px; white-space: nowrap; }
        #dataTableExample td { padding: 12px 16px; border-top: 1px solid #E1E4EB; font-size: 13px; }
        #dataTableExample tbody tr:hover { background: #F6F6F9; }
        .dataTables_wrapper .dataTables_paginate .paginate_button { border-radius: 9999px !important; padding: 6px 14px !important; margin: 0 2px !important; }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #007AFF !important; color: white !important; border: none !important; }
        .dataTables_wrapper .dataTables_filter input { border-radius: 9999px; border: 1px solid #E1E4EB; padding: 8px 16px; outline: none; }
        .dataTables_wrapper .dataTables_filter input:focus { box-shadow: 0 0 0 2px #007AFF; border-color: transparent; }
        .dataTables_wrapper .dataTables_length select { border-radius: 9999px; border: 1px solid #E1E4EB; padding: 6px 12px; }
    </style>
@endpush

@push('plugin-scripts')
    <script src="{{ asset('admin/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/assets/js/data-table.js') }}"></script>
@endpush
