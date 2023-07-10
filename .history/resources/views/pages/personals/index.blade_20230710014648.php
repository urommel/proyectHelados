@if (Session::has('mensaje'))
    <div id="alert-1"
        class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        {{-- <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            A simple info alert with an <a href="#" class="font-semibold underline hover:no-underline">example
                link</a>. Give it a click if you like.
        </div> --}}
        <strong class="ml-3 text-sm font-medium">{{ Session::get('mensaje') }}</strong>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
@endif

<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />

        <div class="card card-default">
            <div class="card-header">
                @section('tituloPage-Header')
                    Personal
                @endsection

                @section('buttonPage-Header')
                    <a href="{{ route('personals.create') }}">
                        {{-- <x-buttons.button-create label="Registrar nuevo personal" /> --}}
                        Registrar nuevo personal
                    </a>
                @endsection

                <x-app.page-header />

                <br>
            </div>
            <div class="card-body">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    DNI
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Apellidos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Celular
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha de nacimiento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Direccion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Foto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personals as $personal)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $personal->dni }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $personal->apellidos }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $personal->celular }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $personal->fecha_nacimiento }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $personal->direccion }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- <img class="h-auto max-w-full" src="{{ asset('storage') . '/' . $personal->foto }}"
                                    alt="image description"> --}}


                                        <img class="rounded-lg w-28 h-28"
                                            src="{{ asset('storage') . '/' . $personal->foto }}"
                                            alt="image description">

                                    </td>

                                    <td class="px-6 py-4">
                                        <form action="{{ url('/personals/' . $personals->id) }}" method="POST">
                                            <a href="{{ url('/personals/' . $personals->id . '/edit') }}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                anclick="return confirm('¿Estas seguro de eliminar este personal?')"
                                                value="Borrar"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                                        </form>


                                        {{-- <form action=""
                                    method="POST">
                                    <a class="m-1 btn btn-sm btn-primary"
                                        href=""><i
                                            class="fa fa-fw fa-eye"></i>
                                        {{-- {{ __('Show') }} --}}
                                        {{-- </a>
                                <a class="m-1 btn btn-sm btn-success" href=""><i class="fa fa-fw fa-edit"></i> --}}
                                        {{-- {{ __('Edit') }} --}}
                                        {{-- </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="m-1 btn btn-danger btn-sm"><i
                                        class="fa fa-fw fa-trash"></i> --}}
                                        {{-- {{ __('Delete') }} --}}
                                        {{-- </button>
                                </form> --}}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
</x-app-layout>
