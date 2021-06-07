@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Editar Cupom</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($coupon, ['route' => ['admin.coupons.update', $coupon->id], 'method' => 'patch']) !!}

                        @include('coupons.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
