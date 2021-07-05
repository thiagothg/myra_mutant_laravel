<div class="modal fade" id="modal-product" aria-labelledby="modal-product" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">    
        <div class="modal-content">
            <form id="form-product" class="needs-validation"  method="POST" action="" novalidate>
                @csrf
                <input class="method" hidden value="">
                <input class="action" hidden value="">
                
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('labels.product') </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @include('product.form')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('labels.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('labels.save')</button>
                </div>
            </form>
        </div>
    </div>
</div>