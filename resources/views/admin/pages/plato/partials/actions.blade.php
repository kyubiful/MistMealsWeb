<button type="button" onclick="window.location='{{ route('admin.plato.edit', $id) }}'" class="btn btn-primary btn-icon" data-toggle="tooltip" data-placement="top" title="@lang('global.general.edit')">
    <i data-feather="edit"></i>
</button>

{!! Form::open(['route' => ['admin.plato.destroy', $id], 'method' => 'DELETE', 'class' => 'd-inline']) !!}
<button type="submit" class="btn btn-danger btn-icon btn-delete" data-toggle="tooltip" data-placement="top" title="@lang('global.general.delete')">
    <i data-feather="trash"></i>
</button>
{!! Form::close() !!}

{!! Form::open(['route' => ['admin.plato.pdf', $id], 'method' => 'GET', 'class' => 'd-inline']) !!}
<button type="submit" class="btn btn-secondary btn-icon btn-delete" data-toggle="tooltip" data-placement="top" title="PDF" formtarget="_blank">
    <i data-feather="file-text"></i>
</button>
{!! Form::close() !!}
