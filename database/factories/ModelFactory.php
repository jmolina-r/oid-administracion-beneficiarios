<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory **/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Pais::class, function (Faker\Generator $faker) {

    return [
        'nombre' => strtolower($faker->country)
    ];
});

$factory->define(App\Beneficiario::class, function (Faker\Generator $faker) {

    return [
        'nombre' => strtolower($faker->firstName),
        'apellido' => strtolower($faker->lastName),
        'fecha_nacimiento' => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-4 years', $timezone = date_default_timezone_get()),
        'sexo' => $faker->regexify('(masculino|femenino)'),
        'rut' => $faker->unique()->regexify('\[1-9]{8,9}\-(k|[0-9])'),
        'pais_id' => $faker->numberBetween($min = 1, $max = 70),
        'estado_civil_id' => $faker->numberBetween($min = 1, $max = 5),
        'educacion_id' => $faker->numberBetween($min = 1, $max = 9),
        'ocupacion_id' => $faker->numberBetween($min = 1, $max = 5)
    ];
});

$factory->define(App\TelefonoBeneficiario::class, function (Faker\Generator $faker) {

    return [
        'numero' => $faker->unique()->regexify('[0-9]{8}'),
        'tipo' => $faker->regexify('(movil|fijo)'),
        'beneficiario_id' => $faker->numberBetween($min = 1, $max = 150)
    ];
});

$factory->define(App\PrestacionRealizada::class, function (Faker\Generator $faker) {

    return [
        'numero' => $faker->regexify('[0-9]{8}'),
        'fecha' => $faker->date('y-m-d','now'),

        'beneficiario_id' => $faker->numberBetween($min = 1, $max = 150)
    ];
});
$factory->define(App\FichaAtencionSocial::class, function (Faker\Generator $faker) {

    return [
        'numero' => $faker->regexify('[0-9]{8}'),
        'descripcion' => $faker->regexify('(Atencion social)'),

        'prestacion_realizadas_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
/*
$factory->define(App\TipoSubmotivoSocial::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->regexify('[0-9]{8}'),

        'ficha_atencion_social_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

$factory->define(App\MotivoAtencionSocial::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->regexify('[0-9]{8}'),
        'descripcion' => $faker->regexify('(Atencion social)'),

        'ficha_atencion_social_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
*/
/*
$factory->define(App\SubMotivoAtencionSocial::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->regexify('[1-5]{1}'),
        'fecha' => $faker->date('y-m-d','now'),
        'observacion' => $faker->regexify('(Atencion social)'),

        'motivo_atencion_social_id' => $faker->numberBetween($min = 1, $max = 100)
    ];
});
*/
$factory->define(App\Tutor::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'beneficiario_id' => $faker->unique()->numberBetween($min = 1, $max = 150)
    ];
});


$factory->define(App\CredencialDiscapacidad::class, function (Faker\Generator $faker) {
    return [
        'fecha_vencimiento' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 years', $timezone = date_default_timezone_get()),
        'beneficiario_id' => $faker->unique()->numberBetween($min = 1, $max = 150)
    ];
});

$factory->define(App\DatoSocial::class, function (Faker\Generator $faker) {
    return [
        'observacion' => $faker->text,
        'beneficiario_id' => $faker->unique()->numberBetween($min = 1, $max = 150)
    ];
});


/*

$factory->define(App\RegistroSocialHogar::class, function (Faker\Generator $faker) {

    $enTramite = $faker->boolean;

    if($enTramite == true) {
        $porcentaje = 0;
    } else {
        $porcentaje = $faker->numberBetween($min = 1, $max = 100);
    }
    return [
        'porcentaje' => $porcentaje,
        'en_tramite' => $enTramite,
        'beneficiario_id' => $faker->unique()->regexify('[1-60]')
    ];
});

*/

$factory->define(App\FichaKinesiologia::class, function (Faker\Generator $faker) {

    return [
        'motivo_consulta' => $faker -> regexify('(Evaluación Movilidad|Evaluación Motora|Evaluación Social)'),
        'situacion_laboral' => $faker -> regexify('(Desempleado|Estudiante|Trabajando)'),
        'situacion_familiar' => $faker -> regexify('(Normal|Anormal)'),
        'asiste_centro_rhb' => $faker -> regexify('(Si|No)'),
        'antecedentes_morbidos_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_motora_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_deambulacion_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_movilidad_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_social_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_autocuidado_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_sensorial_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_com_cog_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_evaluacion_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_control_esfinter_id' => $faker -> numberBetween($min = 1, $max = 2),
        'kinesiologo_id' => $faker -> numberBetween($min = 1, $max = 3),
        'beneficiario_id' => $faker -> numberBetween($min = 1, $max = 150),
    ];
});

$factory->define(App\AntecedentesMorbidos::class, function (Faker\Generator $faker) {

    return [
        'pat_concom' => 'Patología',
        'alergias' => $faker -> regexify('(Respiratoria|Cutanea)'),
        'medicamentos' => $faker -> regexify('(Loratadina|otro)'),
        'ant_quir' => $faker -> regexify('(No|Cirugía)'),
        'aparatos' => $faker -> regexify('(Aparatos|No)'),
        'fuma_sn' => $faker -> regexify('(Si|No)'),
        'alcohol_sn' => $faker -> regexify('(Si|No)'),
        'act_fisica_sn' => $faker -> regexify('(Si|No)'),
    ];
});

$factory->define(App\Kinesiologo::class, function (Faker\Generator $faker) {

    return [
        'rut' => $faker -> regexify('\[1-9]{8,9}\-(k|[0-9])'),
        'nombres' => $faker -> firstName,
        'apellidos' => $faker -> lastName,
        'telefono' => $faker -> regexify('[0-9]{8}'),
        'fecha_nacimiento' => $faker -> dateTimeBetween('-50 years', '-25 years'),
        'direccion' => $faker -> address,
    ];
});

$factory->define(App\Psicologo::class, function (Faker\Generator $faker) {

    return [
        'rut' => $faker -> regexify('\[1-9]{8,9}\-(k|[0-9])'),
        'nombres' => $faker -> firstName,
        'apellidos' => $faker -> lastName,
        'telefono' => $faker -> regexify('[0-9]{8}'),
        'fecha_nacimiento' => $faker -> dateTimeBetween('-50 years', '-25 years'),
        'direccion' => $faker -> address,
    ];
});

$factory->define(App\ValAutocuidado::class, function (Faker\Generator $faker) {

    return [
        'puntaje_alimentacion' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_alimentacion' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_arreglo_pers' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_arreglo_pers' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_bano' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_bano' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_vest_sup' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_vest_sup' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_vest_inf' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_vest_inf' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_aseo_pers' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_aseo_pers' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValComCog::class, function (Faker\Generator $faker) {

    return [
        'puntae_expresion' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_expresion' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_comprension' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_comprension' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValControlEsfinter::class, function (Faker\Generator $faker) {

    return [
        'puntaje_control_vejiga' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_control_vejiga' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_control_intestino' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_control_intestino' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValDeambulacion::class, function (Faker\Generator $faker) {

    return [
        'puntaje_desp_caminando' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_desp_caminando' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntae_escaleras' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_escaleras' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValEvaluacion::class, function (Faker\Generator $faker) {

    return [
        'conexion_medio' => $faker -> regexify('(Normal|Disminuida)'),
        'nivel_cognitivo_apar' => $faker -> regexify('(Normal|Disminuido)'),
    ];
});

$factory->define(App\ValMotora::class, function (Faker\Generator $faker) {

    return [
        'rom' => $faker -> numberBetween($min = 1, $max = 5),
        'fm' => $faker -> numberBetween($min = 1, $max = 5),
        'tono' => $faker -> numberBetween($min = 1, $max = 5),
        'dolor' => $faker -> numberBetween($min = 1, $max = 5),
        'hab_motrices' => $faker -> numberBetween($min = 1, $max = 5),
        'equilibrio' => $faker -> numberBetween($min = 1, $max = 5),
        'coordinacion' => $faker -> numberBetween($min = 1, $max = 5),
    ];
});

$factory->define(App\ValMovilidad::class, function (Faker\Generator $faker) {

    return [
        'puntaje_trans_cama_silla' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_trans_cama_silla' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_traslado_bano' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_traslado_bano' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_traslado_ducha' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_traslado_ducha' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValSensorial::class, function (Faker\Generator $faker) {

    return [
        'visual' => $faker -> numberBetween($min = 1, $max = 5),
        'auditivo' => $faker -> numberBetween($min = 1, $max = 5),
        'tactil' => $faker -> numberBetween($min = 1, $max = 5),
        'propioceptivo' => $faker -> numberBetween($min = 1, $max = 5),
        'vestibular' => $faker -> numberBetween($min = 1, $max = 5),
    ];
});

$factory->define(App\ValSocial::class, function (Faker\Generator $faker) {

    return [
        'puntaje_int_social' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_int_social' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_sol_problemas' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_sol_problemas' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_memoria' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_memoria' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),

    ];
});

$factory->define(App\FichaTerapiaOcupacional::class, function (Faker\Generator $faker) {

    return [
        'diagnostico_base' => $faker -> regexify('(SE DESCONOCE EL DIAGNOSTICO|DERRAME CEREBRAL|RETRASO MENTAL SEVERO|DISTROFIA MUSCULAR|DIABETES)'),
        'motivo_consulta' => $faker -> regexify('(Evaluación Movilidad|Evaluación Motora|Evaluación Social)'),
        'derivado_por' => $faker -> regexify('(Kinesiologo|Psicologo)'),
        'relacion_paciente' => $faker -> regexify('(Padre|Madre|Cuidador|Abuelo)'),
        'observaciones_generales' => $faker -> regexify('(|Comentarios varios)'),
        'actividades_vida_diaria_id' => $faker -> numberBetween($min = 1, $max = 5),
        'antecedentes_salud_id' => $faker -> numberBetween($min = 1, $max = 5),
        'antecedentes_so_fa_id' => $faker -> numberBetween($min = 1, $max = 5),
        'desarrollo_evolutivo_id' => $faker -> numberBetween($min = 1, $max = 5),
        'habilidades_sociales_id' => $faker -> numberBetween($min = 1, $max = 5),
        'historial_clinico_id' => $faker -> numberBetween($min = 1, $max = 5),
        'profesional_id' => $faker -> numberBetween($min = 1, $max = 5),
        'beneficiario_id' => $faker -> numberBetween($min = 1, $max = 150),

    ];
});

$factory->define(App\ActividadesVidaDiaria::class, function (Faker\Generator $faker) {

    return [
        'alimentacion' => $faker -> regexify('(D|P|E)'),
        'comentario_alimen' => $faker -> regexify('comentario 1|comentario 2'),
        'arreglo_personal' => $faker -> regexify('(D|P|E)'),
        'comentario_arreglo' => $faker -> regexify('comentario 1|comentario 2'),
        'banio' => $faker -> regexify('(D|P|E)'),
        'comentario_banio' => $faker -> regexify('comentario 1|comentario 2'),
        'vestuario_superior' => $faker -> regexify('(D|P|E)'),
        'comentario_superior' => $faker -> regexify('comentario 1|comentario 2'),
        'vestuario_inferior' => $faker -> regexify('(D|P|E)'),
        'comentario_inferior' => $faker -> regexify('comentario 1|comentario 2'),
        'ponerse_zapatos' => $faker -> regexify('(D|P|E)'),
        'comentario_zapatos' => $faker -> regexify('comentario 1|comentario 2'),
        'aseo_perianal' => $faker -> regexify('(D|P|E)'),
        'comentario_aseo' => $faker -> regexify('comentario 1|comentario 2'),
        'lavado_dental' => $faker -> regexify('(D|P|E)'),
        'comentario_dental' => $faker -> regexify('comentario 1|comentario 2'),
        'manejo_vesical' => $faker -> regexify('(D|P|E)'),
        'comentario_vesical' => $faker -> regexify('comentario 1|comentario 2'),
        'manejo_anal' => $faker -> regexify('(D|P|E)'),
        'comentario_anal' => $faker -> regexify('comentario 1|comentario 2'),
        'preparar_comida' => $faker -> regexify('(D|P|E)'),
        'comentario_comida' => $faker -> regexify('comentario 1|comentario 2'),
        'poner_mesa' => $faker -> regexify('(D|P|E)'),
        'comentario_mesa' => $faker -> regexify('comentario 1|comentario 2'),
        'limpieza_ligera' => $faker -> regexify('(D|P|E)'),
        'comentario_ligera' => $faker -> regexify('comentario 1|comentario 2'),
        'espacio_ordenado' => $faker -> regexify('(D|P|E)'),
        'comentario_orden' => $faker -> regexify('comentario 1|comentario 2'),
        'manejo_dinero' => $faker -> regexify('(D|P|E)'),
        'comentario_dinero' => $faker -> regexify('comentario 1|comentario 2'),
        'ir_compras' => $faker -> regexify('(D|P|E)'),
        'comentario_compras' => $faker -> regexify('comentario 1|comentario 2'),
        'locomocion' => $faker -> regexify('(D|P|E)'),
        'comentario_locomocion' => $faker -> regexify('comentario 1|comentario 2'),
        'resolver_problemas' => $faker -> regexify('(D|P|E)'),
        'comentario_problemas' => $faker -> regexify('comentario 1|comentario 2'),
        'adecuacion_social' => $faker -> regexify('(D|P|E)'),
        'comentario_adecuacion' => $faker -> regexify('comentario 1|comentario 2'),
        'seguir_instrucciones' => $faker -> regexify('(D|P|E)'),
        'comentario_instrucciones' => $faker -> regexify('comentario 1|comentario 2'),
        'expresar_necesidades' => $faker -> regexify('(D|P|E)'),
        'comentario_necesidades' => $faker -> regexify('comentario 1|comentario 2'),

    ];
});

$factory->define(App\AntecedentesSalud::class, function (Faker\Generator $faker) {

    return [
        'tiempo_gestacional' => $faker -> regexify('(D|P|E)'),
        'tipo_parto' => $faker -> regexify('(Normal|Inducido|Fórceps|Cesárea)'),
        'enfermedades_natal_sn' => $faker -> regexify('(Si|No)'),
        'observaciones_enfermedades' => $faker -> regexify('(|Observaciones varias)'),

    ];
});

$factory->define(App\AntecedentesSocioFamiliares::class, function (Faker\Generator $faker) {

    return [
        'nombre_madre' => $faker -> regexify('(María|Elisa|Abril)'),
        'edad_madre' => $faker ->  numberBetween($min = 26, $max = 45),
        'ocupacion_madre' => $faker -> regexify('(Trabajadora|Dueña de casa)'),
        'escolaridad_madre' => $faker -> regexify('(Educación básica|Educación media|Educación superior)'),
        'horario_trabajo_madre' => $faker -> regexify('(8:00-13:00|15:00-20:00)'),
        'nombre_padre' => $faker -> regexify('(Pedro|Juan|Diego)'),
        'edad_padre' => $faker ->  numberBetween($min = 26, $max = 45),
        'ocupacion_padre' => $faker -> regexify('(Trabajador|Dueño de casa)'),
        'escolaridad_padre' => $faker -> regexify('(Educación básica|Educación media|Educación superior)'),
        'horario_trabajo_padre' => $faker -> regexify('(8:00-13:00|15:00-20:00)'),

    ];
});

$factory->define(App\DesarrolloEvolutivo::class, function (Faker\Generator $faker) {

    return [
        'edad_sento' => $faker -> numberBetween($min = 2, $max = 6),
        'edad_camino' => $faker -> numberBetween($min = 2, $max = 6),
        'edad_palabra' => $faker -> numberBetween($min = 2, $max = 6),
        'control_vesical_sn' => $faker -> regexify('(Si|No)'),
        'edad_control_vesical' => $faker -> numberBetween($min = 2, $max = 6),
        'control_anal_sn' => $faker -> regexify('(Si|No)'),
        'edad_control_anal' => $faker -> numberBetween($min = 2, $max = 6),
        'vesical_diurno' => $faker -> regexify('(Si|No)'),
        'vesical_nocturno' => $faker -> regexify('(Si|No)'),
        'anal_diurno' => $faker -> regexify('(Si|No)'),
        'anal_nocturno' => $faker -> regexify('(Si|No)'),
        'observaciones' => $faker -> regexify('(|Observaciones varias)'),
        'estabilidad_caminar_sna' => $faker -> regexify('(Si|No|A veces)'),
        'caidas_frecuentes_sna' => $faker -> regexify('(Si|No|A veces)'),
        'dominancia_lateral_sna' => $faker -> regexify('(Si|No|A veces)'),
        'garra_sna' => $faker -> regexify('(Si|No|A veces)'),
        'pinza_sna' => $faker -> regexify('(Si|No|A veces)'),
        'como_pinza' => $faker -> regexify('(Si|No|A veces)'),
        'dibuja_sna' => $faker -> regexify('(Si|No|A veces)'),
        'escribe_sna' => $faker -> regexify('(Si|No|A veces)'),
        'corta_sna' => $faker -> regexify('(Si|No|A veces)'),
        'estimulos_visuales' => $faker -> regexify('(Se altera|Se calma|No reacciona)'),
        'estimulos_auditivos' => $faker -> regexify('(Se altera|Se calma|No reacciona)'),
        'estimulos_gustativos' => $faker -> regexify('(Se altera|Se calma|No reacciona)'),
        'estimulos_tactiles' => $faker -> regexify('(Se altera|Se calma|No reacciona)'),
        'estimulos_olfativos' => $faker -> regexify('(Se altera|Se calma|No reacciona)'),
        'come_solo_sn' => $faker -> regexify('(Si|No)'),
        'acepta_solido_sn' => $faker -> regexify('(Si|No)'),
        'acepta_semisolido_sn' => $faker -> regexify('(Si|No)'),
        'acepta_liquidos_sn' => $faker -> regexify('(Si|No)'),
        'temperatura_preferida' => $faker -> regexify('(25°C|30°C|35°C)'),
        'sabores_preferidos' => $faker -> regexify('(Dulce|Salado|Agridulce)'),
        'colores_preferidos' => $faker -> regexify('(Rojo|Verde|Azul|Amarillo)'),
        'ejemplo_comida' => $faker -> regexify('(Pollo asado|Tallarines con salsa|sushi)'),

    ];
});

$factory->define(App\HabilidadesSociales::class, function (Faker\Generator $faker) {

    return [
        'contacto_visual' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'sonrisa_social' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'seguimiento_personas' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'seguimiento_objetos' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'investigacion_visual' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'investigacion_motora' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'atencion_conjunta' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'imitacion_gestual' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'imitacion_vocal' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'imitacion_motora' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'situaciones_repetidas' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'situaciones_nuevas' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'intencion_comunicacional' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'carinioso' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'juego_solitario' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'juego_paralelo' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'juego_interactivo' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'gestos_adecuados' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'inicia_conversacion' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'formula_peticiones' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'aclarar_dudas' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'emisor_receptor' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'ninios_edad' => $faker -> regexify('(Si|No|A veces|Observaciones varias)'),
        'preferencia_tipo_persona' => $faker -> regexify('(Hombre|Mujer|Niños|Ancianos)'),
        'mayores_intereses' => $faker -> regexify('(Jugar|Pintar|Ver películas)'),
        'cosas_no_gustan' => $faker -> regexify('(Conversar|Pintar|Hablar)'),
        'juegos' => $faker -> regexify('(Escondida|Juegos de video|Patear la pelota)'),

    ];
});

$factory->define(App\HistorialClinico::class, function (Faker\Generator $faker) {

    return [
        'enfermedades_familiares' => $faker -> regexify('(Cáncer|Diabetes|Hipertensión|Ninguna)'),
        'evaluacion_psiquiatra' => $faker -> regexify('(Observaciones varias psiquiatra)'),
        'evaluacion_fonoaudiologo' => $faker -> regexify('(Observaciones varias fonoaudiologo)'),
        'evaluacion_ocupacional' => $faker -> regexify('(Observaciones varias ocupacional)'),
        'evaluacion_kinesiologo' => $faker -> regexify('(Observaciones varias kinesiologo)'),
        'evaluacion_psicologo' => $faker -> regexify('(Observaciones varias psicologo)'),
        'otra_evaluacion' => $faker -> regexify('(Observaciones varias Otros)'),
        'tratamientos_recibidos' => $faker -> regexify('(Ninguno|Operación de apendicitis|Opreación Adenoides)'),
        'medicamentos_sn' => $faker -> regexify('(Si|No)'),
        'medicamentos' => $faker -> regexify('(|Paracetamol|Nefersil|Ninguno|Otros medicamentos)'),
        'efectos_medicamentos' => $faker -> regexify('(|Mareos|Sueño|Nada)'),
        'diagnosticos_previos' => $faker -> regexify('(|Diagnótico previo A|Diagnótico previo B)'),
    ];
});

$factory->define(App\Profesional::class, function (Faker\Generator $faker) {

    return [
        'rut' => $faker -> regexify('\[1-9]{8,9}\-(k|[0-9])'),
        'nombres' => $faker -> firstName,
        'apellidos' => $faker -> lastName,
        'telefono' => $faker -> regexify('[0-9]{8}'),
        'fecha_nacimiento' => $faker -> dateTimeBetween('-50 years', '-25 years'),
        'direccion' => $faker -> address,
        'profesion' => $faker -> regexify('Terapia Ocupacional|Kinesiología|Fonoaudiología|Psicología|Asistencia Social'),
    ];
});
