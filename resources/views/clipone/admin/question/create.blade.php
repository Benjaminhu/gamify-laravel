@extends('layouts.admin')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content Header --}}
@section('header')
<h1>
    {{{ $title }}} <small>create a new question</small>
</h1>
@stop

{{-- Breadcrumbs --}}
@section('breadcrumbs')
<li>
    <i class="clip-bubbles-3"></i>
    <a href="{{ URL::route('admin.questions.index') }}">
        {{ trans('admin/site.questions') }}
    </a>
</li>
<li class="active">
    {{ trans('admin/question/title.create_a_new_question') }}
</li>
@stop

{{-- Content --}}
@section('content')

<!-- notifications -->
@include('notifications')
<!-- ./ notifications -->

@include('admin/question/_form')
@stop