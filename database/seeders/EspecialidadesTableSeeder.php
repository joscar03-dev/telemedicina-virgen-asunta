<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especialidades = [
            [
                'nombre' => 'Medicina General',
                'descripcion' => 'La medicina general constituye el primer nivel de atención médica y es imprescindible para la prevención, detección, tratamiento y seguimiento de las enfermedades crónicas estabilizadas.',
            ],
            [
                'nombre' => 'Medicina Interna',
                'descripcion' => 'Se encarga de la atención integral del adulto, así como del diagnóstico y tratamiento no quirúrgico y la prevención de las enfermedades.',
            ],
            [
                'nombre' => 'Traumatología',
                'descripcion' => 'Es una rama dentro de la Medicina que se ocupa de todo lo relacionado con las lesiones óseas o musculares.',
            ],
            [
                'nombre' => 'Cardiología',
                'descripcion' => 'Se especiliza en el diagnóstico y tratamiento de enfermedades del corazón, los vasos sanguíneos y el sistema circulatorio.',
            ],
            [
                'nombre' => 'Ginecología',
                'descripcion' => 'Campo de la medicina que se especializa en la atención de las mujeres durante el embarazo y el parto, y en el diagnóstico y tratamiento de enfermedades de los órganos reproductivos femeninos.',
            ],
            [
                'nombre' => 'Obstetricia',
                'descripcion' => 'Es la especialidad médica que se ocupa del embarazo, el parto y el puerperio, incluyendo las situaciones de riesgo que requieran de una intervención quirúrgica.',
            ],
            [
                'nombre' => 'Pediatría',
                'descripcion' => 'Se especializa en la prevención, el diagnóstico y el tratamiento de enfermedades que involucra la atención médica de bebés, niños y adolescentes.',
            ],
            [
                'nombre' => 'Endicronología',
                'descripcion' => 'Es la especialidad médica que estudia la función y las alteraciones de glándulas endocrinas que son los órganos que producen las hormonas.',
            ],
            [
                'nombre' => 'Neumología',
                'descripcion' => 'Es la especialidad médica encargada del estudio de las enfermedades del aparato respiratorio, en el diagnóstico, tratamiento y prevención de las enfermedades del pulmón, la pleura y el mediastino.',
            ],
            [
                'nombre' => 'Urología',
                'descripcion' => 'Se encarga de la prevención, diagnóstico y tratamiento de enfermedades morfológicas renales, de las del aparato urinario y retro-peritoneo que afectan a ambos sexos.',
            ],
            [
                'nombre' => 'Gastroenterología',
                'descripcion' => 'Parte de la medicina que se ocupa del estómago y los intestinos y sus enfermedades, así como del resto de los órganos del aparato digestivo.',
            ],
            [
                'nombre' => 'Hematología',
                'descripcion' => 'Especialidad médica que se dedica al tratamiento de los pacientes con enfermedades de la sangre o hematológicas.',
            ],
            [
                'nombre' => 'Geriatría',
                'descripcion' => 'Rama de la medicina que se dedica a estudiar las enfermedades que aquejan a las personas mayores y a su cuidado.',
            ],
            [
                'nombre' => 'Oftalmología',
                'descripcion' => 'Diagnostica y trata todas las enfermedades oculares, realiza cirugía ocular y prescribe y ajusta gafas y lentes de contacto para corregir problemas de visión.',
            ],
            [
                'nombre' => 'Psicología',
                'descripcion' => 'Ciencia social que se encarga del estudio de la mente humana y su actividad, así como de las conductas de individuos y grupos.',
            ],
            [
                'nombre' => 'Terapia Física y Rehabilitación',
                'descripcion' => 'Especialidad médica que ayuda a las personas a recobrar las funciones corporales que perdieron debido a enfermedades o lesiones.',
            ],
            [
                'nombre' => 'Nutrición',
                'descripcion' => 'Se encarga de orientar sobre las mejores alternativas alimenticias para sus pacientes.',
            ],
            [
                'nombre' => 'Neumología Pediátrica',
                'descripcion' => 'Especialidad que se encarga de diagnosticar y tratar las enfermedades que afectan al sistema respiratorio (pulmones y bronquios) en los niños.',
            ],
            [
                'nombre' => 'Otorrinolaringología',
                'descripcion' => 'Se encarga de la prevención, diagnóstico y tratamiento, tanto médico como quirúrgico, de las enfermedades de: oído, vías aéreo-digestivas superiores, boca, nariz y senos paranasales, faringe y laringe.',
            ],
            [
                'nombre' => 'Cirugía General',
                'descripcion' => 'La cirugía general aborda, todas aquellas patologías del aparato digestivo, sistema endocrino, órganos intraabdominales y pared abdominal que requieren de una intervención quirúrgica.',
            ],
            [
                'nombre' => 'Cirugía Pediátrica',
                'descripcion' => 'La Cirugía Pediátrica es la especialidad que se encarga del tratamiento quirúrgico de la patología quirúrgica del niño desde el nacimiento hasta los 16 años de edad.',
            ],
            [
                'nombre' => 'Oncológica',
                'descripcion' => 'Es la rama de la medicina que estudia y trata las neoplasias, con especial atención a los tumores malignos o cáncer.',
            ],
            [
                'nombre' => 'Reumatología',
                'descripcion' => 'Especialidad médica que se encarga de prevenir, diagnosticar y tratar las enfermedades musculoesqueléticas y autoinmunes sistémicas.',
            ],
            [
                'nombre' => 'Neurología',
                'descripcion' => 'Especialidad médica que tiene competencia en el estudio del sistema nervioso, y de las enfermedades del cerebro, la médula, los nervios periféricos y los músculos.',
            ],
            [
                'nombre' => 'Neurocirugía',
                'descripcion' => 'Especialidad médica que se encarga del estudio, la prevención, el diagnóstico y el tratamiento de las enfermedades que afectan al sistema nervioso y sus cubiertas.',
            ],
            [
                'nombre' => 'Radiología',
                'descripcion' => 'Es una rama de la medicina que utiliza imágenes para el diagnóstico y tratamiento de lesiones y enfermedades.',
            ],
            [
                'nombre' => 'Psiquiatría',
                'descripcion' => 'La psiquiatría se dedica al estudio y promoción de la salud mental, así como al diagnóstico y tratamiento de los trastornos mentales.',
            ],
            [
                'nombre' => 'Inmunología y Alergología',
                'descripcion' => 'Se especializa en el diagnóstico y tratamiento de las enfermedades que afectan a la respuesta inmune del organismo. Entre las enfermedades más comunes tenemos: urticaria, alergia a alimentos, medicamentos, asma bronquial.',
            ],

        ];

        foreach ($especialidades as $especialidad) {
            Especialidad::create($especialidad);
        }
    }
}
