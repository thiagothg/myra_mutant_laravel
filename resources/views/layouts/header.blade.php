
<?php
use App\Models\Helper;


?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Myra - Mutant
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Helper::verifyCurrentRoute('home') ? 'active' : '' }} " aria-current="page" href="{{ route('home') }}"> @lang('labels.home')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Helper::verifyCurrentRoute('category') ? 'active' : '' }}" href="{{ route('category.index') }}"> @lang('labels.category')</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Helper::verifyCurrentRoute('product') ? 'active' : '' }}" href="{{ route('product.index') }}">@lang('labels.product')</a>
                </li>
            </ul>
        </div>
    </div>
</nav>