<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    <p>{{ $businessContact->name }}</p>
</div>

<div class="form-group">
    {!! Form::label('role', 'Cargo:') !!}
    <p>{{ $businessContact->role }}</p>
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail:') !!}
    <p>{{ $businessContact->email }}</p>
</div>

<div class="form-group">
    {!! Form::label('phone', 'Telefone:') !!}
    <p>{{ $businessContact->phone }}</p>
</div>

<div class="form-group">
    {!! Form::label('message', 'Mensagem:') !!}
    <p>{{ $businessContact->message }}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Mensagem enviada em:') !!}
    <p>{{ $businessContact->created_at->format('d/m/Y H:i:s') }}</p>
</div>

