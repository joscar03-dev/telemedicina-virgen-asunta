<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
    <!-- Buscar por Número de Documento -->
    <div class="mb-6">
        <label for="numero_documento" class="block text-sm font-medium text-gray-700">Número de Documento</label>
        <div class="flex">
            <input type="text" id="numero_documento" wire:model.defer="numero_documento"
                class="mt-2 p-3 border border-gray-300 rounded-l-md w-full focus:ring-2 focus:ring-blue-500"
                placeholder="Ingrese el número de documento">
            <button type="button" wire:click="buscarPaciente"
                class="mt-2 p-3 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Buscar
            </button>
        </div>
    </div>

    @if ($paciente_id)
        <!-- Información del paciente encontrado -->
        <p class="text-gray-700">Paciente encontrado: <strong>{{ $nombre }} {{ $apellido }}</strong></p>
    @else
        @if ($showPacienteForm)
            <!-- Formulario para Registrar Paciente -->
            {{-- <form wire:submit.prevent="createPaciente" class="mt-6 bg-gray-50 p-6 rounded-md shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Registrar Paciente</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Aquí irían los campos del formulario de paciente -->
                </div>
                <button type="submit"
                    class="mt-4 w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Registrar Paciente
                </button>
            </form> --}}
            <form wire:submit.prevent="createPaciente" class="mt-6 bg-gray-50 p-6 rounded-md shadow-md">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">Registrar Paciente</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="nombre" wire:model="nombre"
                            class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                        @error('nombre')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input type="text" id="apellido" wire:model="apellido"
                            class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                        @error('apellido')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
                        <input type="email" id="correo" wire:model="correo"
                            class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                        @error('correo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" id="telefono" wire:model="telefono"
                            class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                        @error('telefono')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input type="text" id="direccion" wire:model="direccion"
                            class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                        @error('direccion')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de
                            Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" wire:model="fecha_nacimiento"
                            class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                        @error('fecha_nacimiento')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                        <select id="sexo" wire:model="sexo"
                            class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                            <option value="">Seleccione</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                        @error('sexo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="numero_seguro" class="block text-sm font-medium text-gray-700">Número de
                            Seguro</label>
                        <input type="text" id="numero_seguro" wire:model="numero_seguro"
                            class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                        @error('numero_seguro')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="mt-4 w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Registrar Paciente
                </button>
            </form>
        @endif
    @endif

    <!-- Formulario para Reservar Cita -->
    @if (!$showPacienteForm && $paciente_id)
        <form wire:submit.prevent="saveCita" class="mt-6 bg-gray-50 p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Reservar Cita</h2>

            <div class="mb-4">
                <label for="especialidad_id" class="block text-sm font-medium text-gray-700">Especialidad</label>
                <select id="especialidad_id" wire:model="especialidad_id"
                    class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                    <option value="">Seleccione una especialidad</option>
                    @foreach ($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                    @endforeach
                </select>
                @error('especialidad_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón para buscar médicos -->
            <div class="mb-4">
                <button wire:click="buscarMedicos" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                    Buscar médicos
                </button>
            </div>

            <div class="mb-4">
                <label for="medico_id" class="block text-sm font-medium text-gray-700">Médico</label>
                <select id="medico_id" wire:model="medico_id"
                    class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500"
                    @if (!$medicos || $medicos->isEmpty()) disabled @endif>
                    <option value="">Seleccione un médico</option>
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->usuario->name }}</option>
                    @endforeach
                </select>
                @if (!$medicos || $medicos->isEmpty())
                    <span class="text-sm text-gray-500">No hay médicos disponibles para esta especialidad.</span>
                @endif
            </div>

            <!-- Botón de "Buscar Disponibilidad" siempre visible -->
            <div class="mb-4">
                <button wire:click="buscarDisponibilidad"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700"
                    @if (!$medico_id) disabled @endif>
                    Buscar Disponibilidad
                </button>
            </div>

            <!-- Fechas disponibles del médico -->
            @if ($disponibilidades && $disponibilidades->isNotEmpty())
                <div class="mb-4">
                    <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                    <select id="fecha" wire:model="fecha"
                        class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                        <option value="">Seleccione una fecha</option>
                        @foreach ($disponibilidades as $disponibilidad)
                            <option value="{{ $disponibilidad->fecha }}">{{ $disponibilidad->fecha }}</option>
                        @endforeach
                    </select>
                    @error('fecha')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            @else
                <p class="text-sm text-gray-500">No hay disponibilidades para este médico.</p>
            @endif

            <div class="mb-4">
                <label for="tipo_cita" class="block text-sm font-medium text-gray-700">Tipo de Cita</label>
                <input type="text" id="tipo_cita" wire:model="tipo_cita"
                    class="mt-2 p-3 border border-gray-300 rounded w-full focus:ring-2 focus:ring-blue-500">
                @error('tipo_cita')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-green-500 text-white py-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                Reservar Cita
            </button>
        </form>
    @endif

    <!-- Mensajes -->
    @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-100 text-green-800 rounded-md">
            {{ session('message') }}
        </div>
    @endif
</div>
