<!-- Title Field -->
<div class="form-group col-sm-8 col-md-8 col-lg-5">
    {!! Form::label('title', 'Título') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-4 col-md-4 col-lg-3">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="clearfix hidden-md hidden-lg"></div>

<!-- Months Field -->
<div class="form-group col-sm-4 col-md-2 col-lg-2">
    {!! Form::label('months', 'Meses') !!}
    {!! Form::select('months', $months, null, ['class' => 'form-control']) !!}
</div>

<div class="clearfix hidden-sm hidden-md"></div>

<!-- Amount Field -->
<div class="form-group col-sm-4 col-md-5 col-lg-3">
    {!! Form::label('amount', 'Valor') !!}
    {!! Form::text('amount', number_format(($plan->amount ?? 0), 2, ',', '.'), ['class' => 'form-control money']) !!}
</div>

<!-- Installment Amount Field -->
<div class="form-group col-sm-4 col-md-5 col-lg-3">
    {!! Form::label('installment_amount', 'Valor parcelado') !!}
    {!! Form::text('installment_amount', number_format(($plan->installment_amount ?? 0), 2, ',', '.'), ['class' => 'form-control money']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.plans.index') }}" class="btn btn-default">Cancelar</a>
</div>
