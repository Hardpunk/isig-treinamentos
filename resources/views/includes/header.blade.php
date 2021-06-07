@include('includes._header-home')

@if(Route::current()->getName() !== 'home')
    @if(Request::is('cursos*') || Request::is('search*') || Request::is('trilhas-conhecimento*'))
    <div id="breadcrumb" class="breadcrumb mb-0 text-white py-4">
        @yield('breadcrumb')
    </div>
    @endif
@endif
