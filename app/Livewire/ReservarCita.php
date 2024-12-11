<?php

namespace App\Livewire;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Especialidad;
use Livewire\Component;

class ReservarCita extends Component
{
    // Variables para la búsqueda y creación de pacientes
    public $numero_documento, $paciente_id, $nombre, $apellido, $correo, $telefono, $direccion, $fecha_nacimiento, $sexo, $numero_seguro;
    public $showPacienteForm = false; // Alternar entre crear y buscar paciente

    // Variables para la reserva de cita
    public $especialidad_id, $medico_id, $fecha, $tipo_cita, $hora_inicio, $hora_fin, $estado = 'pendiente', $observaciones;

    // Lista dinámica de médicos filtrados por especialidad
    public $medicos = [];

    protected $rules = [
        // Validaciones para la cita
        'especialidad_id' => 'required|exists:especialidades,id',
        'medico_id' => 'required|exists:medicos,id',
        'paciente_id' => 'nullable|exists:pacientes,id',
        'fecha' => 'required|date',
        'tipo_cita' => 'required|string|max:50',
        'hora_inicio' => 'required|date_format:H:i',
        'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        'estado' => 'required|string|in:pendiente,confirmada,cancelada',
        'observaciones' => 'nullable|string|max:255',
    ];

    /* public function updatedEspecialidadId()
    {
        // Filtrar médicos por especialidad seleccionada
        $this->medicos = Medico::where('especialidad_id', $this->especialidad_id)->with('usuario')->get();
        $this->medico_id = null; // Reiniciar selección de médico al cambiar la especialidad
    } */

    public function buscarMedicos()
    {
        if ($this->especialidad_id) {
            // Filtra los médicos por especialidad seleccionada
            $this->medicos = Medico::where('especialidad_id', $this->especialidad_id)
                ->with('usuario', 'disponibilidades')
                ->get();
        }
    }

    public function buscarPaciente()
    {
        $paciente = Paciente::where('numero_documento', $this->numero_documento)->first();

        if ($paciente) {
            // Paciente encontrado, asignar datos
            $this->paciente_id = $paciente->id;
            $this->nombre = $paciente->nombre;
            $this->apellido = $paciente->apellido;
        } else {
            // Paciente no encontrado, limpiar campos y mostrar mensaje
            $this->reset(['paciente_id', 'nombre', 'apellido']);
            $this->showPacienteForm = true;
            session()->flash('message', 'No se encontró un paciente con este número de documento. Regístrelo a continuación.');
        }
    }

    public function createPaciente()
    {
        $this->validate([
            'numero_documento' => 'required|string|max:15|unique:pacientes,numero_documento',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'nullable|email|unique:pacientes,correo',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|in:masculino,femenino',
            'numero_seguro' => 'nullable|string|max:50|unique:pacientes,numero_seguro',
        ]);

        $paciente = Paciente::create([
            'numero_documento' => $this->numero_documento,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'sexo' => $this->sexo,
            'numero_seguro' => $this->numero_seguro,
        ]);

        $this->paciente_id = $paciente->id; // Asignar ID del nuevo paciente
        $this->reset(['nombre', 'apellido', 'correo', 'telefono', 'direccion', 'fecha_nacimiento', 'sexo', 'numero_seguro']);
        $this->showPacienteForm = false; // Ocultar el formulario de creación
        session()->flash('message', 'Paciente creado exitosamente.');
    }

    public function saveCita()
    {
        $this->validate();

        Cita::create([
            'medico_id' => $this->medico_id,
            'paciente_id' => $this->paciente_id,
            'fecha' => $this->fecha,
            'tipo_cita' => $this->tipo_cita,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'estado' => $this->estado,
            'observaciones' => $this->observaciones,
        ]);

        $this->reset();
        session()->flash('message', 'Cita reservada exitosamente.');
    }

    public function render()
    {
        return view('livewire.reservar-cita', [
            'especialidades' => Especialidad::all(),
            'medicos' => $this->medicos,
            'pacientes' => Paciente::all(),
        ]);
    }
}
