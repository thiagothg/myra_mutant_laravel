<a href="{{ $route_edit }}"> 
    <i class="fas fa-edit" title="{{ trans('labels.edit') }}" data-toggle="tooltip" data-placement="top">
    </i>
</a>

<a data-name="{{ $description }}" data-id="{{ $code }}" data-method="DELETE" data-item="" class="delete-button" href="{{ $route_delete }}">
    <i class="fas fa-trash" title="{{ trans('labels.delete') }}" data-toggle="tooltip" data-placement="top">
    </i>
</a>