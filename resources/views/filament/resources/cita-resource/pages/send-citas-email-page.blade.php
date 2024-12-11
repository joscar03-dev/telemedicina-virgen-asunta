{{-- <x-filament-panels::page>
    <h1>Enviar Detalles de Cita por Correo</h1>

    <p>A continuación, podrás enviar un correo con todos los datos de la cita.</p>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Botón para enviar el correo -->
    <x-filament::button wire:click="enviarCorreo">
        Enviar Correo
    </x-filament::button>

    <div class="mt-4">
        <h3>Detalles de la cita:</h3>
        <ul>
            <li><strong>Paciente:</strong> {{ $record->paciente->nombre }}</li>
            <li><strong>Médico:</strong> {{ $record->medico->usuario->name }}</li>
            <li><strong>Fecha:</strong> {{ $record->fecha }}</li>
            <li><strong>Hora:</strong> {{ $record->hora_inicio }} - {{ $record->hora_fin }}</li>
            <li><strong>Tipo de cita:</strong> {{ $record->tipo_cita }}</li>
            <li><strong>Observaciones:</strong> {{ $record->observaciones }}</li>
        </ul>
    </div>
</x-filament-panels::page>
 --}}

<x-filament-panels::page class="space-y-6">
    <h1 class="text-2xl font-bold tracking-tight text-gray-900">Enviar Detalles de Cita por Correo</h1>

    <p class="text-gray-500">A continuación, podrás enviar un correo con todos los datos de la cita.</p>

    @if (session('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <!-- Botón para enviar el correo -->


    <div class="mt-6 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Detalles de la cita:</h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Paciente:</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $record->paciente->nombre }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Médico:</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $record->medico->usuario->name }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Fecha:</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $record->fecha }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Hora:</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $record->hora_inicio }} -
                        {{ $record->hora_fin }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Tipo de cita:</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $record->tipo_cita }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Observaciones:</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $record->observaciones }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">URL meet:</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $record->meet_url }}</dd>
                </div>
            </dl>
        </div>
    </div>
    <x-filament::button wire:click="enviarCorreo"
        class="bg-primary-600 hover:bg-primary-500 text-white font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-150 ease-in-out">
        Enviar Correo
    </x-filament::button>
</x-filament-panels::page>
