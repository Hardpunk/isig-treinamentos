@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Contato - {{ $businessContact->name }}</h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('business_contacts.show_fields')
                        <a href="{{ route('admin.contactsBusiness.index') }}" class="btn btn-default">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
