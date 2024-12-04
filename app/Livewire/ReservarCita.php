<?php

namespace App\Livewire;

use App\Models\Cita;
use App\Models\Disponibilidad;
use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Paciente;
use Livewire\Component;

class ReservarCita extends Component
{


    public $esNuevoPaciente = true;
    public $especialidades = [];
    public $medicos = [];
    public $paciente = [];
    public $especialidadSeleccionada;
    public $medicoSeleccionado;

    public function mount()
    {
        $this->especialidades = Especialidad::all();
    }

    public function updatedEspecialidadSeleccionada($value)
    {
        logger("Especialidad seleccionada: $value");
        $this->medicos = Medico::where('especialidad_id', $value)->get();
    }


    public function guardarPaciente()
    {
        if ($this->esNuevoPaciente) {
            $paciente = Paciente::create($this->paciente);
            $this->paciente = $paciente->id; // Usar este ID más adelante
        }
    }

    public function render()
    {
        return view('livewire.reservar-cita');
    }
}
