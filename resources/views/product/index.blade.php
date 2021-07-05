@extends('layouts.app')

@section('breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page"> @lang('labels.products') </li>
@endsection

@section('content')
    <button type="button" id="new-record-button" class="btn btn-dark mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#modal-product">
        @lang('labels.new_record')
    </button>

    @include('product.modal')

    @include('product.grid')
@endsection

@section('scripts')
    <script src="{{ asset('js/products/index.js') }}"></script> 
@endsection
