@extends('layouts.admin')

{{-- Styles --}}
@push('styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendor/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

{{-- Web site Title --}}
@section('title')
    @lang('admin/level/title.level_management') :: @parent
@endsection

{{-- Content Header --}}
@section('header')
    @lang('admin/level/title.level_management')
    <small>create and edit levels</small>
@endsection

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    <li>
        <a href="{{ route('admin.home') }}">
            <i class="fa fa-dashboard"></i> @lang('admin/site.dashboard')
        </a>
    </li>
    <li class="active">
        <a href="{{route('admin.levels.index') }}">
            @lang('admin/site.levels')
        </a>
    </li>
@endsection


{{-- Content --}}
@section('content')

    <!-- Notifications -->
    @include('partials.notifications')
    <!-- ./ notifications -->

    <!-- actions -->
    <a href="{{ route('admin.levels.create') }}">
        <button type="button" class="btn btn-success margin-bottom">
            <i class="fa fa-plus"></i> @lang('admin/level/title.create_a_new_level')
        </button>
    </a>
    <!-- /.actions -->
    <div class="box">
        <div class="box-body">
            <table id="levels" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="col-md-4">@lang('admin/level/model.name')</th>
                    <th class="col-md-4">@lang('admin/level/model.image')</th>
                    <th class="col-md-1">@lang('admin/level/model.required_points')</th>
                    <th class="col-md-1">@lang('admin/level/model.active')</th>
                    <th class="col-md-2">@lang('general.actions')</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="col-md-4">@lang('admin/level/model.name')</th>
                    <th class="col-md-4">@lang('admin/level/model.image')</th>
                    <th class="col-md-1">@lang('admin/level/model.required_points')</th>
                    <th class="col-md-1">@lang('admin/level/model.active')</th>
                    <th class="col-md-2">@lang('general.actions')</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

{{-- Scripts --}}
@push('scripts')
    <script type="text/javascript"
            src="{{ asset('vendor/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendor/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {
            $('#levels').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.7/i18n/@lang('site.dataTablesLang').json"
                },
                "ajax": "{{ route('admin.levels.data') }}",
                "columns": [
                    {data: "name"},
                    {data: "image", "orderable": false, "searchable": false},
                    {data: "required_points"},
                    {data: "active"},
                    {data: "actions", "orderable": false, "searchable": false}
                ],
                "aLengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "@lang('general.all')"]
                ],
                // set the initial value
                "iDisplayLength": 10
            });
        });
    </script>
@endpush
