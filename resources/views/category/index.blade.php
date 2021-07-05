@extends('layouts.app')

@section('title', 'category')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"> @lang('labels.category') </li>
@endsection


@section('content')
    @include('layouts.messages')

    <button type="button" id="new-record-button" class="btn btn-dark mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#modal-category">
        @lang('labels.new_record')
    </button>

    @include('category.modal', ['method' => 'POST', 'route' => route('ajaxCategory.store')])
    
    @include('category.grid')
@endsection


@section('scripts')
    <script src="{{ asset('js/category/index.js') }}"></script> 
@endsection