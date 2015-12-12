@extends('layouts.admin')

{{-- Styles --}}
@section('styles')
{{ HTML::style(Theme::asset('plugins/select2/select2.css')) }}
{{ HTML::style(Theme::asset('plugins/DataTables/media/css/DT_bootstrap.css')) }}
@stop

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content Header --}}
@section('header')
    <h1> 
        {{{ $title }}} <small>create and edit users</small>
    </h1>
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs')
<li>
    <i class="clip-bubbles-3"></i>
    <a href="{{ URL::route('admin.users.index') }}">
        {{ trans('admin/site.users') }}
    </a>
</li>
<li class="active">
    {{ trans('admin/user/title.user_management') }}
</li>
@stop

{{-- Content --}}
@section('content')

<!-- Notifications -->
@include('notifications')
<!-- ./ notifications -->

<!-- actions -->
<div class="row">
    <div class="col-md-12 space20">
        <a class="btn btn-green add-row" href="{{ URL::to('admin/users/create') }}">
            <i class="fa fa-plus"></i> {{{ trans('admin/user/title.create_a_new_user') }}}
        </a>
    </div>
</div>
<!-- /.actions -->

<div class="row">
    <div class="col-xs-12">
             {{ $table
                    ->setClass('table table-striped table-bordered table-hover table-full-width')
                    ->render() }}
    </div>
</div>

@stop

{{-- Scripts --}}
@section('scripts')
{{ $table
    ->setOptions(array(
        'sPaginationType' => 'bootstrap',
        'bProcessing' => true,
        'aoColumnDefs' => array('aTargets' => array(-1), 'bSortable' => false)
    ))
    ->script('partials.datatables') }}
@stop