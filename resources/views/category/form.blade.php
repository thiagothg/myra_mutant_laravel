

<div class="mt-3 col-md-12">
  <label for="des_category" class="form-label"> @lang('labels.category')</label>
  <input type="text" class="form-control" id="des_category" name="des_category" value="" required>

  <div class="invalid-feedback"></div>
</div>

<div class="mt-3 col-12">
  <div class="form-check">
    <label class="form-check-label" for="flg_active">@lang('labels.flg_active')</label>
    <input type="hidden" value="{{ env('FLG_INACTIVE') }}" name="flg_active">
    <input class="form-check-input" type="checkbox" name="flg_active" value="{{ env('FLG_ACTIVE') }}" id="flg_active">
  </div>
</div>

<input type="hidden" value="" id="id">