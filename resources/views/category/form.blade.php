
<form id="form-category" class="row g-3 needs-validation"  method="{{ $method }}" action="{{ $route }}" novalidate>
    @csrf

    <div class="col-md-6">
      <label for="des_category" class="form-label"> @lang('labels.category')</label>
      <input type="text" class="form-control" id="des_category" name="des_category" value="" required>

      {{-- <div class="valid-feedback">
        Looks good!
      </div> --}}

      <div class="invalid-feedback">
      </div>
    </div>

    <div class="col-12">
      <div class="form-check">
        <label class="form-check-label" for="flg_active">@lang('labels.flg_active')</label>
        <input type="hidden" value="{{ env('FLG_INACTIVE') }}" name="flg_active">
        <input class="form-check-input" type="checkbox" name="flg_active" value="{{ env('FLG_ACTIVE') }}" id="flg_active">
        
        <div class="invalid-feedback">
          You must agree before submitting.
        </div>
      </div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary" type="submit"> @lang('labels.save')</button>
    </div>
</form>

<a id="link-index" href="{{route('category.index')}}"></a>

@section('scripts')
  <script src="{{ asset('js/category/form.js') }}"></script> 
@endsection