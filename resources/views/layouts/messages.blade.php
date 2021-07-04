

<?php
use Illuminate\Support\Facades\Session;
?>

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ Session::get('success') }} </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif