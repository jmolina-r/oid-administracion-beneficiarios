<?php

namespace App\Http\Controllers;

use App\FichaEducacion;
use App\TestCoordinacion;
use App\TestLenguaje;
use App\TestMotricidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Beneficiario;
use App\Funcionario;

class FichaEducacionController extends Controller
{
    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @param $id
     * @return view
     */
    public function create($id)
    {
        $persona = Beneficiario::find($id);
        return view('area-medica.ficha-evaluacion-inicial.educacion.create')
            ->with(compact('id'))
            ->with(compact('persona'));
    }

    /**
     * Guardar datos recibidos del formulario en bd.
     *
     * @param Request $request
     * @return view
     */
    public function store(Request $request)
    {
        $ultimaFicha = FichaEducacion::where('beneficiario_id', $request->input('id'))->orderBy('created_at', $direction = 'des');

        if ($ultimaFicha->first() != null) {
            if ($ultimaFicha->first()->estado == 'abierto') {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        // Validate Fields
        $this->validate($request, $this->rules($request));

        if (Auth::check()) {
            $idUsuario = Auth::user()->id;
            $idFuncionario = Auth::user()->funcionario_id;
            if ($idFuncionario == null) {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        try {

            $test_coordinacion = new TestCoordinacion([
                'traslada' => $request->input('traslada'),
                'construye_puente' => $request->input('construye_puente'),
                'construye_torre' => $request->input('construye_torre'),
                'desabotona' => $request->input('desabotona'),
                'abotona' => $request->input('abotona'),
                'enhebra' => $request->input('enhebra'),
                'desata' => $request->input('desata'),
                'copia_recta' => $request->input('copia_recta'),
                'copia_circulo' => $request->input('copia_circulo'),
                'copia_cruz' => $request->input('copia_cruz'),
                'copia_triang' => $request->input('copia_triang'),
                'copia_cuadra' => $request->input('copia_cuadra'),
                'dibuja_9' => $request->input('dibuja_9'),
                'dibuja_6' => $request->input('dibuja_6'),
                'dibuja_3' => $request->input('dibuja_3'),
                'ordena' => $request->input('ordena'),
            ]);
            $test_coordinacion->save();

            $test_lenguaje = new TestLenguaje([
                'p1' => $request->input('p1'),
                'p1_grande' => $request->input('p1_grande'),
                'p1_chico' => $request->input('p1_chico'),
                'p2' => $request->input('p2'),
                'p2_menos' => $request->input('p2_menos'),
                'p2_mas' => $request->input('p2_mas'),
                'p3' => $request->input('p3'),
                'p3_gato' => $request->input('p3_gato'),
                'p3_perro' => $request->input('p3_perro'),
                'p3_chancho' => $request->input('p3_chancho'),
                'p3_pato' => $request->input('p3_pato'),
                'p3_paloma' => $request->input('p3_paloma'),
                'p3_oveja' => $request->input('p3_oveja'),
                'p3_tortuga' => $request->input('p3_tortuga'),
                'p3_gallina' => $request->input('p3_gallina'),
                'p4' => $request->input('p4'),
                'p4_paraguas' => $request->input('p4_paraguas'),
                'p4_vela' => $request->input('p4_vela'),
                'p4_escoba' => $request->input('p4_escoba'),
                'p4_tetera' => $request->input('p4_tetera'),
                'p4_zapatos' => $request->input('p4_zapatos'),
                'p4_reloj' => $request->input('p4_reloj'),
                'p4_serrucho' => $request->input('p4_serrucho'),
                'p4_taza' => $request->input('p4_taza'),
                'p5' => $request->input('p5'),
                'p5_largo' => $request->input('p5_largo'),
                'p5_corto' => $request->input('p5_corto'),
                'p6' => $request->input('p6'),
                'p6_cortando' => $request->input('p6_cortando'),
                'p6_saltando' => $request->input('p6_saltando'),
                'p6_planchando' => $request->input('p6_planchando'),
                'p6_comiendo' => $request->input('p6_comiendo'),
                'p7' => $request->input('p7'),
                'p7_cuchara' => $request->input('p7_cuchara'),
                'p7_lapiz' => $request->input('p7_lapiz'),
                'p7_jabon' => $request->input('p7_jabon'),
                'p7_escoba' => $request->input('p7_escoba'),
                'p7_cama' => $request->input('p7_cama'),
                'p7_tijera' => $request->input('p7_tijera'),
                'p8' => $request->input('p8'),
                'p8_pesado' => $request->input('p8_pesado'),
                'p8_liviano' => $request->input('p8_liviano'),
                'p9' => $request->input('p9'),
                'p9_nombre' => $request->input('p9_nombre'),
                'p9_apellido' => $request->input('p9_apellido'),
                'p10' => $request->input('p10'),
                'p11' => $request->input('p11'),
                'p11_papa' => $request->input('p11_papa'),
                'p11_mama' => $request->input('p11_mama'),
                'p12' => $request->input('p12'),
                'p12_hambre' => $request->input('p12_hambre'),
                'p12_cansado' => $request->input('p12_cansado'),
                'p12_frio' => $request->input('p12_frio'),
                'p13' => $request->input('p13'),
                'p13_detras' => $request->input('p13_detras'),
                'p13_sobre' => $request->input('p13_sobre'),
                'p13_bajo' => $request->input('p13_bajo'),
                'p14' => $request->input('p14'),
                'p14_hielo' => $request->input('p14_hielo'),
                'p14_raton' => $request->input('p14_raton'),
                'p14_mama' => $request->input('p14_mama'),
                'p15' => $request->input('p15'),
                'p15_azul' => $request->input('p15_azul'),
                'p15_amarillo' => $request->input('p15_amarillo'),
                'p15_rojo' => $request->input('p15_rojo'),
                'p16' => $request->input('p16'),
                'p16_azul' => $request->input('p16_azul'),
                'p16_amarillo' => $request->input('p16_amarillo'),
                'p16_rojo' => $request->input('p16_rojo'),
                'p17' => $request->input('p17'),
                'p17_circulo' => $request->input('p17_circulo'),
                'p17_cuadrado' => $request->input('p17_cuadrado'),
                'p17_tringulo' => $request->input('p17_tringulo'),
                'p18' => $request->input('p18'),
                'p18_circulo' => $request->input('p18_circulo'),
                'p18_cuadrado' => $request->input('p18_cuadrado'),
                'p18_triangulo' => $request->input('p18_triangulo'),
                'p19' => $request->input('p19'),
                'p19_13' => $request->input('p19_13'),
                'p19_14' => $request->input('p19_14'),
                'p20' => $request->input('p20'),
                'p21' => $request->input('p21'),
                'p22' => $request->input('p22'),
                'p22_antes' => $request->input('p22_antes'),
                'p22_despues' => $request->input('p22_despues'),
                'p23' => $request->input('p23'),
                'p23_manzana' => $request->input('p23_manzana'),
                'p23_pelota' => $request->input('p23_pelota'),
                'p23_zapato' => $request->input('p23_zapato'),
                'p23_abrigo' => $request->input('p23_abrigo'),
                'p24' => $request->input('p24'),
                'p24_pelota' => $request->input('p24_pelota'),
                'p24_globo' => $request->input('p24_globo'),
                'p24_bolsa' => $request->input('p24_bolsa'),
            ]);
            $test_lenguaje->save();

            $test_Motricidad = new TestMotricidad([
                'salta' => $request->input('salta'),
                'camina' => $request->input('camina'),
                'lanza' => $request->input('lanza'),
                'para_10' => $request->input('para_10'),
                'para_5' => $request->input('para_5'),
                'para_1' => $request->input('para_1'),
                'camina_punta' => $request->input('camina_punta'),
                'salta_20' => $request->input('salta_20'),
                'salta_3' => $request->input('salta_3'),
                'coge' => $request->input('coge'),
                'camina_adelante' => $request->input('camina_adelante'),
                'camina_atras' => $request->input('camina_atras'),
            ]);
            $test_Motricidad->save();

            $fecha_actual = date("Y-m-d");
            $persona = Beneficiario::find($request->input('id'));


            $origDate = $persona->fecha_nacimiento;
            $newDate = date("Y-m-d", strtotime($origDate));

            // separamos en partes las fechas
            $array_nacimiento = explode("-", $newDate);
            $array_actual = explode("-", $fecha_actual);
            $anos = $array_actual[0] - $array_nacimiento[0]; // calculamos años
            $meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
            $dias = $array_actual[2] - $array_nacimiento[2]; // calculamos días

            //ajuste de posible negativo en $días
            if ($dias < 0) {
                --$meses;

                //ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
                switch ($array_actual[1]) {
                    case 1:
                        $dias_mes_anterior = 31;
                        break;
                    case 2:
                        $dias_mes_anterior = 31;
                        break;
                    case 3:
                        if (bisiesto($array_actual[0])) {
                            $dias_mes_anterior = 29;
                            break;
                        } else {
                            $dias_mes_anterior = 28;
                            break;
                        }
                    case 4:
                        $dias_mes_anterior = 31;
                        break;
                    case 5:
                        $dias_mes_anterior = 30;
                        break;
                    case 6:
                        $dias_mes_anterior = 31;
                        break;
                    case 7:
                        $dias_mes_anterior = 30;
                        break;
                    case 8:
                        $dias_mes_anterior = 31;
                        break;
                    case 9:
                        $dias_mes_anterior = 31;
                        break;
                    case 10:
                        $dias_mes_anterior = 30;
                        break;
                    case 11:
                        $dias_mes_anterior = 31;
                        break;
                    case 12:
                        $dias_mes_anterior = 30;
                        break;
                }

                $dias = $dias + $dias_mes_anterior;
            }

            //ajuste de posible negativo en $meses
            if ($meses < 0) {
                --$anos;
                $meses = $meses + 12;
            }

            $fichaEducacion = new FichaEducacion([
                'estado' => 'abierto',
                'categ_coordinacion' => $request->input('categ_coordinacion'),
                'categ_lenguaje' => $request->input('categ_lenguaje'),
                'categ_motricidad' => $request->input('categ_motricidad'),
                'categ' => $request->input('categ'),
                'total_coordinacion' => $request->input('total_coordinacion'),
                'total_lenguaje' => $request->input('total_lenguaje'),
                'total_motricidad' => $request->input('total_motricidad'),
                'total' => $request->input('total'),
                'pt_coordinacion' => $request->input('pt_coordinacion'),
                'pt_lenguaje' => $request->input('pt_lenguaje'),
                'pt_motricidad' => $request->input('pt_motricidad'),
                'pt' => $request->input('pt'),
                'observacion' => $request->input('observacion'),

                'edad' => $anos,
                'meses' => $meses,
                'dias' => $dias,

                'funcionario_id' => $idFuncionario,
                'beneficiario_id' => $request->input('id'),
                'test_coordinacion_id' => $test_coordinacion->id,
                'test_lenguaje_id' => $test_lenguaje->id,
                'test_motricidad_id' => $test_Motricidad->id,
            ]);

            $fichaEducacion->save();
        } catch (Exception $e) {

            //procedimiento en caso de reportar errores
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }
        return redirect(route('area-medica.ficha-evaluacion-inicial.fichas.listaFichas', $request->input('id')));
    }

    /**
     * Show the form for finding a resourse
     *
     * @return Response
     */
    public function find()
    {
        //
    }

    function bisiesto($anio_actual)
    {
        $bisiesto = false;
        //probamos si el mes de febrero del año actual tiene 29 días
        if (checkdate(2, 29, $anio_actual)) {
            $bisiesto = true;
        }
        return $bisiesto;
    }

    /**
     * Mostrar formulario de ingreso de evaluacion inicial.
     *
     * @return Response
     */
    public function show($id)
    {
        $fichaEducacion = FichaEducacion::find($id);

        if ($fichaEducacion == null) {
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }


        $persona = Beneficiario::find($fichaEducacion->beneficiario_id);
        $funcionario = Funcionario::find($fichaEducacion->funcionario_id);
        $test_coordinacion = TestCoordinacion::find($fichaEducacion->test_coordinacion_id);
        $test_lenguaje = TestLenguaje::find($fichaEducacion->test_lenguaje_id);
        $test_motricidad = TestMotricidad::find($fichaEducacion->test_motricidad_id);


        return view('area-medica.ficha-evaluacion-inicial.educacion.show', compact('fichaEducacion'))
            ->with(compact('persona'))
            ->with(compact('test_coordinacion'))
            ->with(compact('test_lenguaje'))
            ->with(compact('funcionario'))
            ->with(compact('test_motricidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($fichaId)
    {
        $fichaEducacion = FichaEducacion::find($fichaId);

        if ($fichaEducacion == null) {
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }
        //Validar que no se puedan editar fichas cerradas.
        if ($fichaEducacion != null) {
            if ($fichaEducacion->estado == 'cerrado') {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        $persona = Beneficiario::find($fichaEducacion->beneficiario_id);
        $funcionario = Funcionario::find($fichaEducacion->funcionario_id);
        $test_coordinacion = TestCoordinacion::find($fichaEducacion->test_coordinacion_id);
        $test_lenguaje = TestLenguaje::find($fichaEducacion->test_lenguaje_id);
        $test_motricidad = TestMotricidad::find($fichaEducacion->test_motricidad_id);


        return view('area-medica.ficha-evaluacion-inicial.educacion.edit', compact('fichaEducacion'))
            ->with(compact('persona'))
            ->with(compact('test_coordinacion'))
            ->with(compact('test_lenguaje'))
            ->with(compact('funcionario'))
            ->with(compact('test_motricidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        // Validate Fields
        $this->validate($request, $this->rules($request));

        if (Auth::check()) {
            $idFuncionario = Auth::user()->funcionario_id;
            if ($idFuncionario == null) {
                return view('area-medica.ficha-evaluacion-inicial.Error');
            }
        }

        try {

            $fichaEducacion = FichaEducacion::find($request->input('fichaId'));
            $test_coordinacion = TestCoordinacion::find($fichaEducacion->test_coordinacion_id);
            $test_lenguaje = TestLenguaje::find($fichaEducacion->test_lenguaje_id);
            $test_motricidad = TestMotricidad::find($fichaEducacion->test_motricidad_id);


            $fichaEducacion->categ_coordinacion = $request->input('categ_coordinacion');
            $fichaEducacion->categ_lenguaje = $request->input('categ_lenguaje');
            $fichaEducacion->categ_motricidad = $request->input('categ_motricidad');
            $fichaEducacion->categ = $request->input('categ');
            $fichaEducacion->total_coordinacion = $request->input('total_coordinacion');
            $fichaEducacion->total_lenguaje = $request->input('total_lenguaje');
            $fichaEducacion->total_motricidad = $request->input('total_motricidad');
            $fichaEducacion->total = $request->input('total');
            $fichaEducacion->pt_coordinacion = $request->input('pt_coordinacion');
            $fichaEducacion->pt_lenguaje = $request->input('pt_lenguaje');
            $fichaEducacion->pt_motricidad = $request->input('pt_motricidad');
            $fichaEducacion->pt = $request->input('pt');
            $fichaEducacion->observacion = $request->input('observacion');
            $fichaEducacion->save();


            $test_coordinacion->traslada = $request->input('traslada');
            $test_coordinacion->construye_puente = $request->input('construye_puente');
            $test_coordinacion->construye_torre = $request->input('construye_torre');
            $test_coordinacion->desabotona = $request->input('desabotona');
            $test_coordinacion->abotona = $request->input('abotona');
            $test_coordinacion->enhebra = $request->input('enhebra');
            $test_coordinacion->desata = $request->input('desata');
            $test_coordinacion->copia_recta = $request->input('copia_recta');
            $test_coordinacion->copia_circulo = $request->input('copia_circulo');
            $test_coordinacion->copia_cruz = $request->input('copia_cruz');
            $test_coordinacion->copia_triang = $request->input('copia_triang');
            $test_coordinacion->copia_cuadra = $request->input('copia_cuadra');
            $test_coordinacion->dibuja_9 = $request->input('dibuja_9');
            $test_coordinacion->dibuja_6 = $request->input('dibuja_6');
            $test_coordinacion->dibuja_3 = $request->input('dibuja_3');
            $test_coordinacion->ordena = $request->input('ordena');
            $test_coordinacion->save();

            $test_lenguaje->p1 = $request->input('p1');
            $test_lenguaje->p1_grande = $request->input('p1_grande');
            $test_lenguaje->p1_chico = $request->input('p1_chico');
            $test_lenguaje->p2 = $request->input('p2');
            $test_lenguaje->p2_menos = $request->input('p2_menos');
            $test_lenguaje->p2_mas = $request->input('p2_mas');
            $test_lenguaje->p3 = $request->input('p3');
            $test_lenguaje->p3_gato = $request->input('p3_gato');
            $test_lenguaje->p3_perro = $request->input('p3_perro');
            $test_lenguaje->p3_chancho = $request->input('p3_chancho');
            $test_lenguaje->p3_pato = $request->input('p3_pato');
            $test_lenguaje->p3_paloma = $request->input('p3_paloma');
            $test_lenguaje->p3_oveja = $request->input('p3_oveja');
            $test_lenguaje->p3_tortuga = $request->input('p3_tortuga');
            $test_lenguaje->p3_gallina = $request->input('p3_gallina');
            $test_lenguaje->p4 = $request->input('p4');
            $test_lenguaje->p4_paraguas = $request->input('p4_paraguas');
            $test_lenguaje->p4_vela = $request->input('p4_vela');
            $test_lenguaje->p4_escoba = $request->input('p4_escoba');
            $test_lenguaje->p4_tetera = $request->input('p4_tetera');
            $test_lenguaje->p4_zapatos = $request->input('p4_zapatos');
            $test_lenguaje->p4_reloj = $request->input('p4_reloj');
            $test_lenguaje->p4_serrucho = $request->input('p4_serrucho');
            $test_lenguaje->p4_taza = $request->input('p4_taza');
            $test_lenguaje->p5 = $request->input('p5');
            $test_lenguaje->p5_largo = $request->input('p5_largo');
            $test_lenguaje->p5_corto = $request->input('p5_corto');
            $test_lenguaje->p6 = $request->input('p6');
            $test_lenguaje->p6_cortando = $request->input('p6_cortando');
            $test_lenguaje->p6_saltando = $request->input('p6_saltando');
            $test_lenguaje->p6_planchando = $request->input('p6_planchando');
            $test_lenguaje->p6_comiendo = $request->input('p6_comiendo');
            $test_lenguaje->p7 = $request->input('p7');
            $test_lenguaje->p7_cuchara = $request->input('p7_cuchara');
            $test_lenguaje->p7_lapiz = $request->input('p7_lapiz');
            $test_lenguaje->p7_jabon = $request->input('p7_jabon');
            $test_lenguaje->p7_escoba = $request->input('p7_escoba');
            $test_lenguaje->p7_cama = $request->input('p7_cama');
            $test_lenguaje->p7_tijera = $request->input('p7_tijera');
            $test_lenguaje->p8 = $request->input('p8');
            $test_lenguaje->p8_pesado = $request->input('p8_pesado');
            $test_lenguaje->p8_liviano = $request->input('p8_liviano');
            $test_lenguaje->p9 = $request->input('p9');
            $test_lenguaje->p9_nombre = $request->input('p9_nombre');
            $test_lenguaje->p9_apellido = $request->input('p9_apellido');
            $test_lenguaje->p10 = $request->input('p10');
            $test_lenguaje->p11 = $request->input('p11');
            $test_lenguaje->p11_papa = $request->input('p11_papa');
            $test_lenguaje->p11_mama = $request->input('p11_mama');
            $test_lenguaje->p12 = $request->input('p12');
            $test_lenguaje->p12_hambre = $request->input('p12_hambre');
            $test_lenguaje->p12_cansado = $request->input('p12_cansado');
            $test_lenguaje->p12_frio = $request->input('p12_frio');
            $test_lenguaje->p13 = $request->input('p13');
            $test_lenguaje->p13_detras = $request->input('p13_detras');
            $test_lenguaje->p13_sobre = $request->input('p13_sobre');
            $test_lenguaje->p13_bajo = $request->input('p13_bajo');
            $test_lenguaje->p14 = $request->input('p14');
            $test_lenguaje->p14_hielo = $request->input('p14_hielo');
            $test_lenguaje->p14_raton = $request->input('p14_raton');
            $test_lenguaje->p14_mama = $request->input('p14_mama');
            $test_lenguaje->p15 = $request->input('p15');
            $test_lenguaje->p15_azul = $request->input('p15_azul');
            $test_lenguaje->p15_amarillo = $request->input('p15_amarillo');
            $test_lenguaje->p15_rojo = $request->input('p15_rojo');
            $test_lenguaje->p16 = $request->input('p16');
            $test_lenguaje->p16_azul = $request->input('p16_azul');
            $test_lenguaje->p16_amarillo = $request->input('p16_amarillo');
            $test_lenguaje->p16_rojo = $request->input('p16_rojo');
            $test_lenguaje->p17 = $request->input('p17');
            $test_lenguaje->p17_circulo = $request->input('p17_circulo');
            $test_lenguaje->p17_cuadrado = $request->input('p17_cuadrado');
            $test_lenguaje->p17_tringulo = $request->input('p17_tringulo');
            $test_lenguaje->p18 = $request->input('p18');
            $test_lenguaje->p18_circulo = $request->input('p18_circulo');
            $test_lenguaje->p18_cuadrado = $request->input('p18_cuadrado');
            $test_lenguaje->p18_triangulo = $request->input('p18_triangulo');
            $test_lenguaje->p19 = $request->input('p19');
            $test_lenguaje->p19_13 = $request->input('p19_13');
            $test_lenguaje->p19_14 = $request->input('p19_14');
            $test_lenguaje->p20 = $request->input('p20');
            $test_lenguaje->p21 = $request->input('p21');
            $test_lenguaje->p22 = $request->input('p22');
            $test_lenguaje->p22_antes = $request->input('p22_antes');
            $test_lenguaje->p22_despues = $request->input('p22_despues');
            $test_lenguaje->p23 = $request->input('p23');
            $test_lenguaje->p23_manzana = $request->input('p23_manzana');
            $test_lenguaje->p23_pelota = $request->input('p23_pelota');
            $test_lenguaje->p23_zapato = $request->input('p23_zapato');
            $test_lenguaje->p23_abrigo = $request->input('p23_abrigo');
            $test_lenguaje->p24 = $request->input('p24');
            $test_lenguaje->p24_pelota = $request->input('p24_pelota');
            $test_lenguaje->p24_globo = $request->input('p24_globo');
            $test_lenguaje->p24_bolsa = $request->input('p24_bolsa');
            $test_lenguaje->save();

            $test_motricidad->salta = $request->input('salta');
            $test_motricidad->camina = $request->input('camina');
            $test_motricidad->lanza = $request->input('lanza');
            $test_motricidad->para_10 = $request->input('para_10');
            $test_motricidad->para_5 = $request->input('para_5');
            $test_motricidad->para_1 = $request->input('para_1');
            $test_motricidad->camina_punta = $request->input('camina_punta');
            $test_motricidad->salta_20 = $request->input('salta_20');
            $test_motricidad->salta_3 = $request->input('salta_3');
            $test_motricidad->coge = $request->input('coge');
            $test_motricidad->camina_adelante = $request->input('camina_adelante');
            $test_motricidad->camina_atras = $request->input('camina_atras');
            $test_motricidad->save();


        } catch (Exception $e) {

            //procedimiento en caso de reportar errores
            return view('area-medica.ficha-evaluacion-inicial.Error');
        }
        return redirect(route('area-medica.ficha-evaluacion-inicial.fichas.listaFichas', $request->input('id')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function rules(Request $request)
    {
        $rules = [
            'id' => 'required|exists:beneficiarios',
            'traslada' => 'nullable|max:200',
            'construye_puente' => 'nullable|max:200',
            'construye_torre' => 'nullable|max:200',
            'desabotona' => 'nullable|max:200',
            'abotona' => 'nullable|max:200',
            'enhebra' => 'nullable|max:200',
            'desata' => 'nullable|max:200',
            'copia_recta' => 'nullable|max:200',
            'copia_circulo' => 'nullable|max:200',
            'copia_cruz' => 'nullable|max:200',
            'copia_triang' => 'nullable|max:200',
            'copia_cuadra' => 'nullable|max:200',
            'dibuja_9' => 'nullable|max:200',
            'dibuja_6' => 'nullable|max:200',
            'dibuja_3' => 'nullable|max:200',
            'ordena' => 'nullable|max:200',
            //test-lenguaje
            'p1' => 'nullable|max:2',
            'p1_grande' => 'nullable|max:2',
            'p1_chico' => 'nullable|max:2',
            'p2' => 'nullable|max:2',
            'p2_menos' => 'nullable|max:2',
            'p2_mas' => 'nullable|max:2',
            'p3' => 'nullable|max:2',
            'p3_gato' => 'nullable|max:2',
            'p3_perro' => 'nullable|max:2',
            'p3_chancho' => 'nullable|max:2',
            'p3_pato' => 'nullable|max:2',
            'p3_paloma' => 'nullable|max:2',
            'p3_oveja' => 'nullable|max:2',
            'p3_tortuga' => 'nullable|max:2',
            'p3_gallina' => 'nullable|max:2',
            'p4' => 'nullable|max:2',
            'p4_paraguas' => 'nullable|max:2',
            'p4_vela' => 'nullable|max:2',
            'p4_escoba' => 'nullable|max:2',
            'p4_tetera' => 'nullable|max:2',
            'p4_zapatos' => 'nullable|max:2',
            'p4_reloj' => 'nullable|max:2',
            'p4_serrucho' => 'nullable|max:2',
            'p4_taza' => 'nullable|max:2',
            'p5' => 'nullable|max:2',
            'p5_largo' => 'nullable|max:2',
            'p5_corto' => 'nullable|max:2',
            'p6' => 'nullable|max:2',
            'p6_cortando' => 'nullable|max:2',
            'p6_saltando' => 'nullable|max:2',
            'p6_planchando' => 'nullable|max:2',
            'p6_comiendo' => 'nullable|max:2',
            'p7' => 'nullable|max:2',
            'p7_cuchara' => 'nullable|max:2',
            'p7_lapiz' => 'nullable|max:2',
            'p7_jabon' => 'nullable|max:2',
            'p7_escoba' => 'nullable|max:2',
            'p7_cama' => 'nullable|max:2',
            'p7_tijera' => 'nullable|max:2',
            'p8' => 'nullable|max:2',
            'p8_pesado' => 'nullable|max:2',
            'p8_liviano' => 'nullable|max:2',
            'p9' => 'nullable|max:2',
            'p9_nombre' => 'nullable|max:2',
            'p9_apellido' => 'nullable|max:2',
            'p10' => 'nullable|max:2',
            'p11' => 'nullable|max:2',
            'p11_papa' => 'nullable|max:2',
            'p11_mama' => 'nullable|max:2',
            'p12' => 'nullable|max:2',
            'p12_hambre' => 'nullable|max:2',
            'p12_cansado' => 'nullable|max:2',
            'p12_frio' => 'nullable|max:2',
            'p13' => 'nullable|max:2',
            'p13_detras' => 'nullable|max:2',
            'p13_sobre' => 'nullable|max:2',
            'p13_bajo' => 'nullable|max:2',
            'p14' => 'nullable|max:2',
            'p14_hielo' => 'nullable|max:2',
            'p14_raton' => 'nullable|max:2',
            'p14_mama' => 'nullable|max:2',
            'p15' => 'nullable|max:2',
            'p15_azul' => 'nullable|max:2',
            'p15_amarillo' => 'nullable|max:2',
            'p15_rojo' => 'nullable|max:2',
            'p16' => 'nullable|max:2',
            'p16_azul' => 'nullable|max:2',
            'p16_amarillo' => 'nullable|max:2',
            'p16_rojo' => 'nullable|max:2',
            'p17' => 'nullable|max:2',
            'p17_circulo' => 'nullable|max:2',
            'p17_cuadrado' => 'nullable|max:2',
            'p17_tringulo' => 'nullable|max:2',
            'p18' => 'nullable|max:2',
            'p18_circulo' => 'nullable|max:2',
            'p18_cuadrado' => 'nullable|max:2',
            'p18_triangulo' => 'nullable|max:2',
            'p19' => 'nullable|max:2',
            'p19_13' => 'nullable|max:2',
            'p19_14' => 'nullable|max:2',
            'p20' => 'nullable|max:2',
            'p21' => 'nullable|max:2',
            'p22' => 'nullable|max:2',
            'p22_antes' => 'nullable|max:2',
            'p22_despues' => 'nullable|max:2',
            'p23' => 'nullable|max:2',
            'p23_manzana' => 'nullable|max:2',
            'p23_pelota' => 'nullable|max:2',
            'p23_zapato' => 'nullable|max:2',
            'p23_abrigo' => 'nullable|max:2',
            'p24' => 'nullable|max:2',
            'p24_pelota' => 'nullable|max:2',
            'p24_globo' => 'nullable|max:2',
            'p24_bolsa' => 'nullable|max:2',
            //test motricidad
            'salta' => 'nullable|max:2',
            'camina' => 'nullable|max:2',
            'lanza' => 'nullable|max:2',
            'para_10' => 'nullable|max:2',
            'para_5' => 'nullable|max:2',
            'para_1' => 'nullable|max:2',
            'camina_punta' => 'nullable|max:2',
            'salta_20' => 'nullable|max:2',
            'salta_3' => 'nullable|max:2',
            'coge' => 'nullable|max:2',
            'camina_adelante' => 'nullable|max:2',
            'camina_atras' => 'nullable|max:2',
            //ficha_educacion
            'categ_coordinacion' => 'nullable|max:10',
            'categ_lenguaje' => 'nullable|max:10',
            'categ_motricidad' => 'nullable|max:10',
            'categ' => 'nullable|max:10',
            'total_coordinacion' => 'nullable',
            'total_lenguaje' => 'nullable',
            'total_motricidad' => 'nullable',
            'total' => 'nullable',
            'pt_coordinacion' => 'nullable',
            'pt_lenguaje' => 'nullable',
            'pt_motricidad' => 'nullable',
            'pt' => 'nullable',
            'observacion' => 'nullable|max:20000',

            'funcionario_id' => 'nullable',
            'beneficiario_id' => 'nullable',
            'test_coordinacion_id' => 'nullable',
            'test_lenguaje_id' => 'nullable',
            'test_motricidad_id' => 'nullable',
        ];
        return $rules;
    }
}
