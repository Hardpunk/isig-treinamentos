{!! Form::open(['route' => ['admin.contactsBusiness.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.contactsBusiness.show', $id) }}" title="Visualizar" class='btn btn-default btn-sm'>
        <i class="fas fa-eye"></i>
    </a>
    {!! Form::button('<i class="fas fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'title' => 'Excluir',
        'onclick' => "return confirm('Deseja mesmo excluir?')"
    ]) !!}
</div>
{!! Form::close() !!}
