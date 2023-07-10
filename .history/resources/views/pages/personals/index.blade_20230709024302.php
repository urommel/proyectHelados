<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />

        Ver todos los personales


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
                                {{ $personal->foto }}
                            </td>

                            <td class="px-6 py-4">
                                <form action="{{ url('/personals/'.$personal->id)}}" method="POST">
                                    {{-- <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Eliminar</a> --}}

                                    <input type="sutbmit"
                                        anclick="return confirm('¿Estas seguro de eliminar este personal?')"
                                        value="Borrar"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"></input>

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
</x-app-layout>
