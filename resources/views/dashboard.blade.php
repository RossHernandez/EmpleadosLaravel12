<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empleados') }}
        </h2>
    </x-slot>


    <div>
        @include('components.tabla-principal', ['empleadosList' => $empleadosList ])
    </div>





</x-app-layout>
