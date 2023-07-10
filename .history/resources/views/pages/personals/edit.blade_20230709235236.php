<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />

        <div class="card card-default">
            <div class="card-header">
                {{-- <span class="card-title">{{ __('Create') }} Personal</span>
                <h3 class="m-2 font-bold">{{ __('Editar') }} Personal</h3> --}}

                @section('tituloPage-Header')
            Crear Personal
        @endsection

        @section('buttonPage-Header')
            <a href="{{ route('personals')}}">
                {{-- <x-buttons.button-create label="Registrar nuevo personal" /> --}}
                Regresar
            </a>
        @endsection

        <x-app.page-header/>
            </div>
            <div class="card-body">
                <form action="{{ url('/personals/'.$personal->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Formulario --}}
                    @include('pages.personals.form', ['modo'=>'Editar'])

                </form>
            </div>
        </div>

    </div>
</x-app-layout>
