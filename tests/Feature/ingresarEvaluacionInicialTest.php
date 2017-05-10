<?php

namespace Tests\Feature;
use App;
use App\FichaKinesiologia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\AssertTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Beneficiario;


class ingresarEvaluacionInicialTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Prueba si se puede crear ingresar una evaluación inicial de kinesiologia.
     * @test
     * @return void
     */
    public function ingresarEvaluacionInicial()
    {



        $beneficiarios = Beneficiario::all();

        $this->artisan("db:seed");
        $this->visit('/medica/ficha-evaluacion-inicial/kinesiologia/ingresar')
            ->type('','rut')
            ->type('plop','pat_concom')
            ->type('chocolate','alergias')
            ->type('paracetamol','medicamentos')
            ->type('operación a columna','ant_quir')
            ->type('ninguno','aparatos')
            ->type('si','fuma_sn')
            ->type('no','alcohol_sn')
            ->type('si','act_fisica_sn')
            ->type('solo','situacion_familiar')
            ->type('sin trabajo','situacion_laboral')
            ->type('no','asiste_centro_rhb')
            ->type('solo','motivo_consulta')
            ->type('12','puntaje_alimentacion')
            ->type('ninguno','coment_aimentacion')
            ->type('23','puntaje_arreglo_pers')
            ->type('ninguno','coment_arreglo_pers')
            ->type('12','puntaje_bano')
            ->type('ninguno','coment_bano')
            ->type('12','puntaje_vest_sup')
            ->type('ninguno','coment_vest_sup')
            ->type('12','puntaje_vest_inf')
            ->type('ninguno','coment_vest_inf')
            ->type('12','puntaje_aseo_pers')
            ->type('ninguno','coment_aseo_pers')
            ->type('12','puntaje_control_vejiga')
            ->type('ninguno','coment_contrl_vejiga')
            ->type('12','puntaje_control_intestino')
            ->type('ninguno','coment_control_intestino')
            ->type('12','puntaje_trans_cama_silla')
            ->type('ninguno','coment_trans_cama_silla')
            ->type('12','puntaje_traslado_bano')
            ->type('ninguno','coment_traslado_bano')
            ->type('12','puntaje_traslado_ducha')
            ->type('ninguno','coment_traslado_ducha')
            ->type('12','puntaje_desp_caminando')
            ->type('ninguno','coment_desp_caminando')
            ->type('12','puntaje_escaleras')
            ->type('ninguno','coment_escaleras')
            ->type('12','puntaje_expresion')
            ->type('ninguno','coment_expresion')
            ->type('12','puntaje_int_social')
            ->type('ninguno','coment_int_social')
            ->type('12','puntaje_sol_problemas')
            ->type('ninguno','coment_sol_problemas')
            ->type('12','puntaje_memoria')
            ->type('ninguno','coment_memoria')
            ->type('12','puntaje_comprension')
            ->type('ninguno','coment_comprension')
            ->type('23','conexion_medio')
            ->type('1','nivel_cognitivo_apar')
            ->type('21','visual')
            ->type('32','auditivo')
            ->type('21','tactil')
            ->type('21','propioceptivo')
            ->type('34','vestibular')
            ->type('21','tono')
            ->type('21','rom')
            ->type('21','dolor')
            ->type('21','fm')
            ->type('21','hab_motrices')
            ->type('21','coordinacion')
            ->type('21','equilibrio')
            ->press('Finalizar')
            ->seeInDatabase('val_motoras',['rom'=>'21']);


    }
}
