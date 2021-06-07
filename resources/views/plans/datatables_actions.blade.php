{{-- {!! Form::open(['route' => ['admin.plans.destroy', $id], 'method' => 'delete']) !!} --}}
<div class='btn-group'>
    {{-- <a href="{{ route('admin.plans.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a> --}}
    <a href="{{ route('admin.plans.edit', $id) }}" class='btn btn-default btn-sm' title="Editar">
        <i class="fa fa-edit"></i>
    </a>
    {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!} --}}
</div>
{{-- {!! Form::close() !!} --}}
