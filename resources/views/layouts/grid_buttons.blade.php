<a href="{{ $route_edit }}" data-id="{{ $code }}" data-method="PUT" data-route="{{ $route_get_item }}" class="update-button"> 
    <i class="fas fa-edit" title="{{ trans('labels.edit') }}" data-toggle="tooltip" data-placement="top">
    </i>
</a>

<a data-name="{{ $description }}" data-id="{{ $code }}" data-method="DELETE" data-item="" class="delete-button" href="{{ $route_delete }}">
    <i class="fas fa-trash" title="{{ trans('labels.delete') }}" data-toggle="tooltip" data-placement="top">
    </i>
</a>
