@extends('layouts.app')

@section('title', 'category')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"> @lang('labels.category') </li>
@endsection


@section('content')
    @include('layouts.messages')
    <a class="btn btn-dark mb-3 mt-3" href="{{ route('category.create') }}" role="button">@lang('labels.new_record')</a>
    @include('category.grid')
@endsection


@section('scripts')
    <script src="{{ asset('js/category/index.js') }}"></script> 
@endsection