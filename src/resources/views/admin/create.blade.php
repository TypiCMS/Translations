@extends('core::admin.master')

@section('title', __('New translation'))

@section('content')

    @include('core::admin._button-back', ['module' => 'translations'])
    <h1>
        @lang('New translation')
    </h1>

    {!! BootForm::open()->action(route('admin::index-translations'))->multipart()->role('form') !!}
        @include('translations::admin._form')
    {!! BootForm::close() !!}

@endsection
