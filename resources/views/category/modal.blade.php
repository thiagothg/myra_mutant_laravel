<div class="modal fade" id="modal-category" tabindex="-1" aria-labelledby="modal-category" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="form-category" class="needs-validation"  method="{{ $method }}" action="{{ $route }}" novalidate>
            @csrf
            <input class="method" hidden value="{{ $method }}">
            <input class="action" hidden value="{{ $route }}">
            
            <div class="modal-header">
                <h5 class="modal-title" id="modal-category"> @lang('labels.category') </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                @include('category.form')
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('labels.close')</button>
                <button type="submit" class="btn btn-primary">@lang('labels.save')</button>
            </div>
        </form>
      </div>
    </div>
</div>