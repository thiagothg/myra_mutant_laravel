<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Myra Mutant  - @yield('title') </title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
        <div class="">
            {{-- HEADER --}}
            @include('layouts.header')
    
            <div class="container">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> @lang('labels.home') </a></li>
                        @yield('breadcrumbs')
                    </ol>
                </nav>
    
                @yield('content')
            </div>
    
    
            @include('layouts.footer')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="{{ asset('/js/script.js') }}"></script>
        @yield('scripts')
    </body>
</html>