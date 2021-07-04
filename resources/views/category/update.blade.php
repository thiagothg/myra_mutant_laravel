<?php


use Illuminate\Support\Facades\Crypt;
?>

@extends('layouts.app')

@section('title', 'Category')


@section('breadcrumbs')
    <li class="breadcrumb-item"> @lang('labels.category') </li>
    <li class="breadcrumb-item active" aria-current="page"> @lang('labels.edit') @lang('labels.category') </li>
@endsection

@section('content')
  <div class="card border">
    <div class="card-body">
        @include('category.form', ['method' => 'POST', 'route' => route('ajaxCategory.update', ['ajaxCategory' => Crypt::encryptString($id)])])
    </div>
  </div>
@endsection


