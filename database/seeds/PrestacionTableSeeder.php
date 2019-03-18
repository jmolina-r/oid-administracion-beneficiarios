<?php

use Illuminate\Database\Seeder;

class PrestacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///////////////////////////////////Fonoaudiologo////////////////////////////////
        $prestacion = new \App\Prestacion([
            'nombre' => 'EVALUACION',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'INTERVENCION',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ORIENTACION',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'PREVENCION',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'APRESTO LABORAL',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ESTIMULACION TEMPRANA',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'DERIVACION',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'VISITA',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ORIENTACION',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'GESTION',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'INFORME',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'OTRO',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

         ///////////////////////////////////Kinesiologo/////////////////////////////////
        $prestacion = new \App\Prestacion([
            'nombre' => 'EVALUACION',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'NEUROREHABILITACION',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ACONDICIONAMIENTO CARDIOVASCULAR',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'TERAPIA EN PISCINA',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'KINESIOTERAPIA MOTORA',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ESTIMULACION TEMPRANA',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'PSICOMOTRICIDAD',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'DERIVACION',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'VISITA',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ORIENTACION',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'GESTION',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'INFORME',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'OTRO',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();

        //////////////////////////////Terapeuta ocupacional///////////////////////////
        $prestacion = new \App\Prestacion([
            'nombre' => 'EVALUACION',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'INFORME',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'VISITA',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'GESTION',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ORIENTACION',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'INTEGRACION SENSORIAL',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'AVD    ',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'OTRO',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();

        //////////////////////////////////Psicologo/////////////////////////////////
        $prestacion = new \App\Prestacion([
            'nombre' => 'EVALUACION PSICOLOGICA',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'EVALUACION PSICOMETRICA',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'INTERVENCION FAMILIAR',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'PROCESO TERAPEUTICO INDICUDUAL',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'INFORME',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ENTREVISTA LABORAL',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'APRESTO LABORAL',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'AUTOCUIDADO',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'AUTONOMIA E INDEPENDENCIA',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'VISITA',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ORIENTACION',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'GESTION',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'OTRO',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

        //////////////////////////////////Tallerista/////////////////////////////////
        $prestacion = new \App\Prestacion([
            'nombre' => 'EVALUACION',
            'area' => 'Tallerista',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'TRATAMIENTO',
            'area' => 'Tallerista',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'DERIVACION',
            'area' => 'Tallerista',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ORIENTACION',
            'area' => 'Tallerista',
        ]);
        $prestacion->save();

        //////////////////////////////////Educador/////////////////////////////////
        $prestacion = new \App\Prestacion([
            'nombre' => 'DEPORTIVO',
            'area' => 'Educador',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ARTISTICO VISUAL',
            'area' => 'Educador',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ARTISTICO ESCENICO',
            'area' => 'Educador',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'ARTISTICO MANUAL',
            'area' => 'Educador',
        ]);
        $prestacion->save();
        $prestacion = new \App\Prestacion([
            'nombre' => 'OFICIOS',
            'area' => 'Educador',
        ]);
        $prestacion->save();
        $prestacion = new \App\Prestacion([
            'nombre' => 'ACADEMICA',
            'area' => 'Educador',
        ]);
        $prestacion->save();
    }
}

