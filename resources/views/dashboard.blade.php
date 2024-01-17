<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-green-500 flex">
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-700 hover:text-gray-900 dark:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">+ Crear nuevo Usuario</a>
                </div>
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <h2 class="mt-4 text-xl font-semibold">Listado de Usuarios</h2>
                    <ul class="pl-8 mt-2 ">
                        @foreach ($users as $user)
                            <div class="flex justify-between">
                                <li>{{ $user->name }} {{$user->lastname}} - {{ $user->email }}</li>
                                <a class="p-5 bg-white text-black cursor-pointer"  href="{{ route('user.edit', ['user' => $user->id]) }}">
                                    Modificar Registro
                                </a>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
