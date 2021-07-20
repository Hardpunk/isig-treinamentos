@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Fatura #{{ $payment->order_id  }}</h1>
    </section>

    @include('payments.show_fields')
@endsection
