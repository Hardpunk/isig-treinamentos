<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    <p>{{ $contact->name }}</p>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail:') !!}
    <p>{{ $contact->email }}</p>
</div>

<div class="form-group">
    {!! Form::label('phone', 'Telefone:') !!}
    <p>{{ $contact->phone }}</p>
</div>

<div class="form-group">
    {!! Form::label('message', 'Mensagem:') !!}
    <p>{{ $contact->message }}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Mensagem enviada em:') !!}
    <p>{{ $contact->created_at->format('d/m/Y H:i:s') }}</p>
</div>


