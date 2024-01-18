<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight dark:bg-gray-900">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-gray-900 dark:text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex">
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-gray-400 border  border-white hover:border-gray-400 rounded-lg dark:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 px-4 py-2">+ Crear nuevo Usuario</a>
                </div>
                <div class="p-6 text-white">
                    {{ __("Estás logueado..!") }}
                    <h2 class="mt-4 text-xl font-semibold mb-4">Listado de Usuarios</h2>
                    <div class="pl-8 mt-2 flex flex-wrap w-full gap-4 ">
                        @foreach ($users as $user)
                            <div class="flex flex-col w-1/3 py-4 px-6 border border-gray-700 items-center justify-center">
                                <div class="text-xl">{{ $user->name }} {{$user->lastname}} </div>
                                <div>{{ $user->email }}</div>
                                <div class="mb-4">{{ $user->phone }}</div>
                                <a class="px-2 py-2 border  border-white rounded-lg cursor-pointer"  href="{{ route('user.edit', ['user' => $user->id]) }}">
                                    Modificar Usuario
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
