

<div class="mt-3 col-md-12">
  <label for="des_product" class="form-label"> @lang('labels.product')</label>
  <input type="text" class="form-control" id="des_product" name="des_product" value="" required>

  <div class="invalid-feedback"></div>
</div>

<div class="mt-3 col-md-12">
  <label for="qtd_storage" class="form-label"> @lang('labels.qtd_storage')</label>
  <input type="number" class="form-control" id="qtd_storage" name="qtd_storage" value="" required>

  <div class="invalid-feedback"></div>
</div>

<div class="mt-3 col-md-12">
  <label for="qtd_price" class="form-label"> @lang('labels.qtd_price')</label>
  <input type="number" class="form-control" id="qtd_price" name="qtd_price" value="" required>

  <div class="invalid-feedback"></div>
</div>

<div class="mt-3 col-md-12">
  <label for="cod_category" class="form-label"> @lang('labels.category')</label>
  <div class="col-12">
    <select class="" id="cod_category" name="cod_category" required>
      <option value=""> @lang('labels.selecione')</option>
    </select>
  </div>

  <div class="invalid-feedback"></div>
</div>

<div class="mt-3 col-12">
  <div class="form-check">
    <label class="form-check-label" for="flg_active">@lang('labels.flg_active')</label>
    <input type="hidden" value="{{ env('FLG_INACTIVE') }}" name="flg_active">
    <input class="form-check-input" type="checkbox" name="flg_active" value="{{ env('FLG_ACTIVE') }}" id="flg_active">
  </div>
</div>

<input type="hidden" value="" name="cod_product" id="cod_product">