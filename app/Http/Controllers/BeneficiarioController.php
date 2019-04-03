<?php

namespace App\Http\Controllers;

use App\Demanda;
use App\Descripcion;
use App\Estado;
use function MongoDB\BSON\toJSON;
use \PDF;

use App\Beneficiario;
use App\Beneficio;
use App\CredencialDiscapacidad;
use App\DatoSocial;
use App\Domicilio;
use App\Educacion;
use App\EstadoCivil;
use App\FichaBeneficiario;
use App\FichaDiscapacidad;
use App\FichaDiscTipoDisc;
use App\Fonasa;
use App\Isapre;
use App\Ocupacion;
use App\OrganizacionSocial;
use App\Pais;
use App\Prevision;
use App\RegistroSocialHogar;
use App\SistemaProteccion;
use App\TelefonoBeneficiario;
use App\TelefonoTutor;
use App\TipoDependencia;
use App\TipoDiscapacidad;
use App\Tutor;
use App\DemandaBeneficiario;
use App\HistorialDemanda;
use \Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class BeneficiarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        \Debugbar::warning('Watch out…');

        //Lista de Paises
        $paises = Pais::get();

        //Lista de Estados Civiles
        $estados_civiles = EstadoCivil::get();

        //Situacin actual, cesante, estudiante, etc...
        $situaciones = Ocupacion::get();

        //Niveles de educacion, basico, universitario, etc...
        $niveles_educacion = Educacion::get();

        //Dependencias del paciente
        $dependencias = TipoDependencia::get();

        $fonasa = Fonasa::get();

        $isapre = Isapre::get();

        $tipo_discapacidades = TipoDiscapacidad::get();

        $previsiones = Prevision::get();

        $datos_sociales = SistemaProteccion::get();

        $organizaciones_sociales = OrganizacionSocial::get();

        $beneficios = Beneficio::get();
        $demandas = Demanda::get();

        return view('beneficiario.create')
            ->with(compact('paises'))
            ->with(compact('estados_civiles'))
            ->with(compact('previsiones'))
            ->with(compact('situaciones'))
            ->with(compact('niveles_educacion'))
            ->with(compact('dependencias'))
            ->with(compact('fonasa'))
            ->with(compact('tipo_discapacidades'))
            ->with(compact('isapre'))
            ->with(compact('datos_sociales'))
            ->with(compact('organizaciones_sociales'))
            ->with(compact('beneficios'))
            ->with(compact('demandas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //$this->validate($request, [
        //    'rut' => 'required|unique:beneficiarios,rut'
        //], $this->messagesmessages($request));

        $validar = Validator::make($request->all(), [
            'rut' => 'unique:beneficiarios',
        ]);

        if ($validar->fails()) {
            return redirect()->back()->withInput()->withErrors($validar->errors());
        }
        // Validate Fields
        $this->validate($request, $this->rules($request), $this->messages($request));

        // Beneficiario Save
        $beneficiario = new Beneficiario([
            'nombre' => strtolower($request->input('nombres')),
            'apellido' => strtolower($request->input('apellidos')),
            'fecha_nacimiento' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('fecha_nacimiento')))),
            'sexo' => strtolower($request->input('sexo')),
            'rut' => $request->input('rut'),
            'pais_id' => $request->input('id_pais'),
            'estado_civil_id' => $request->input('estado_civil'),
            'educacion_id' => $request->input('educacion'),
            'ocupacion_id' => $request->input('ocupacion'),
            'email' => $request->input('email'),
        ]);
        $beneficiario->save();

        // TelefonoBeneficiario Save
        if ($request->input('tel_fijo')) {
            $telefonoFijo = new TelefonoBeneficiario([
                'numero' => $request->input('tel_fijo'),
                'tipo' => 'fijo',
                'beneficiario_id' => $beneficiario->id
            ]);
            $telefonoFijo->save();
        }
        // TelefonoBeneficiario Save (Movil)
        if ($request->input('tel_movil')) {
            $telefonoMovil = new TelefonoBeneficiario([
                'numero' => $request->input('tel_movil'),
                'tipo' => 'movil',
                'beneficiario_id' => $beneficiario->id
            ]);
            $telefonoMovil->save();
        }

        // CredencialDiscapacidad Save
        if ($request->input('credencial_discapacidad') != 0) {
            if ($request->input('credencial_discapacidad') == 2) {
                $credeDic = new CredencialDiscapacidad([
                    'fecha_vencimiento' => null,
                    'en_tramite' => true,
                    'beneficiario_id' => $beneficiario->id
                ]);
                $credeDic->save();
            } elseif ($request->input('credencial_discapacidad') == 1) {
                $credeDic = new CredencialDiscapacidad([
                    'fecha_vencimiento' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('credencial_vencimiento')))),
                    'en_tramite' => false,
                    'beneficiario_id' => $beneficiario->id
                ]);
                $credeDic->save();
            }
        }

        // RegistroSocialHogar Save
        if ($request->input('registro_social_hogares') != 0) {
            if ($request->input('registro_social_hogares') == 2) {
                $regSocHog = new RegistroSocialHogar([
                    'porcentaje' => null,
                    'en_tramite' => true,
                    'beneficiario_id' => $beneficiario->id
                ]);
                $regSocHog->save();
            } elseif ($request->input('registro_social_hogares') == 1) {
                $regSocHog = new RegistroSocialHogar([
                    'porcentaje' => $request->input('registro_social_porcentaje'),
                    'en_tramite' => false,
                    'beneficiario_id' => $beneficiario->id
                ]);
                $regSocHog->save();
            }
        }

        // Domicilio Save
        if ($request->input('domicilio_calle')) {
            $domicilio = new Domicilio([
                'pobl_vill' => $request->input('domicilio_poblacion'),
                'calle' => $request->input('domicilio_calle'),
                'numero' => $request->input('domicilio_numero'),
                'bloque' => $request->input('domicilio_block'),
                'numero_depto' => $request->input('domicilio_numero_dpto'),
                'beneficiario_id' => $beneficiario->id,
            ]);
            $domicilio->save();
        }

        // Tutor Save
        if ($request->input('nombre_tutor') || $request->input('apellido_tutor')) {
            $tutor = new Tutor([
                'nombre' => $request->input('nombre_tutor'),
                'apellido' => $request->input('apellido_tutor'),
                'beneficiario_id' => $beneficiario->id
            ]);
            $tutor->save();

            // TelefonoTutor Save
            $telefonoTutor = new TelefonoTutor([
                'numero' => $request->input('telefono_tutor'),
                'tutor_id' => $tutor->id
            ]);
            $telefonoTutor->save();
        }

        // FichaBeneficiario Save
        $fichaBeneficiario = new FichaBeneficiario([
            'fecha_ingreso' => date('Y-m-d'),
            'beneficiario_id' => $beneficiario->id
        ]);
        $fichaBeneficiario->save();

        // DatoSocial Save
        $arrDatoSocial['ficha_beneficiario_id'] = $fichaBeneficiario->id;
        $arrDatoSocial['observacion'] = $request->input('observacion_general');

        if ($request->input('sistema_salud') && $request->input('sistema_salud') == 'fonasa') {
            $arrDatoSocial['fonasa_id'] = $request->input('fonasa');
        } elseif ($request->input('sistema_salud') && $request->input('sistema_salud') == 'isapre') {
            $arrDatoSocial['isapre_id'] = $request->input('isapre');
        }

        if ($request->input('prevision') && $request->input('prevision') != '') {
            $arrDatoSocial['prevision_id'] = $request->input('prevision');
        }

        if ($request->input('sistema_proteccion') && $request->input('sistema_proteccion') != '') {
            $arrDatoSocial['sistema_proteccion_id'] = $request->input('sistema_proteccion');
        }

        $datoSocial = new DatoSocial($arrDatoSocial);
        $datoSocial->save();

        // Beneficio Save
        if ($request->input('beneficios')) {
            foreach ($request->input('beneficios') as $key => $val) {
                if (is_numeric($val)) {
                    $beneficio = Beneficio::find($val);
                    if ($beneficio) {
                        $datoSocial->beneficios()->save($beneficio);
                    }
                } else {
                    $beneficio = new Beneficio([
                        'nombre' => strtolower($val)
                    ]);
                    $beneficio->save();
                    $datoSocial->beneficios()->save($beneficio);
                }
            }
        }

        // OrganizacionSocial Save
        if ($request->input('organizaciones_sociales')) {
            foreach ($request->input('organizaciones_sociales') as $key => $val) {
                if (is_numeric($val)) {
                    $organizacionSocial = OrganizacionSocial::find($val);
                    if ($organizacionSocial) {
                        $datoSocial->organizaciones_sociales()->save($organizacionSocial);
                    }
                } else {
                    $organizacionSocial = new OrganizacionSocial([
                        'nombre' => strtolower($val)
                    ]);
                    $organizacionSocial->save();
                    $datoSocial->organizaciones_sociales()->save($organizacionSocial);
                }
            }
        }

        // FichaDiscapacidad Save
        $fichaDiscapacidad = new FichaDiscapacidad([
            'requiere_cuidado' => $request->input('cuidados'),
            'diagnostico' => $request->input('diagnostico'),
            'otras_enfermedades' => $request->input('otras_enfermedades'),
            'ficha_beneficiario_id' => $fichaBeneficiario->id,
            'tipo_dependencia_id' => $request->input('tipo_dependencia')
        ]);
        $fichaDiscapacidad->save();

        // TipoDiscapacidad Save
        if ($request->input('tipo_discapacidad')) {
            foreach ($request->input('tipo_discapacidad') as $key => $val) {
                if ($val > 0 && TipoDiscapacidad::find($key)) {
                    $fichaDiscTipoDisc = new fichaDiscTipoDisc([
                        'porcentaje' => $val,
                        'ficha_discapacidad_id' => $fichaDiscapacidad->id,
                        'tipo_discapacidad_id' => $key
                    ]);
                    $fichaDiscTipoDisc->save();
                }
            }
        }

        $planDeRehabilitacionTratamientoControl = $request->input('p_reha_trat_ctrl');

        $demandas = $request->input('demandaCheckbox');

        if ($demandas != null) {
            foreach ($demandas as $demanda) {

                $demandaBeneficiario = new DemandaBeneficiario([
                    'demanda_id' => $demanda,
                    'beneficiario_id' => $beneficiario->id
                ]);
                $demandaBeneficiario->save();

                $historialDemanda = new HistorialDemanda([
                    'demanda_beneficiario_id' => $demandaBeneficiario->id,
                    'estado_id' => 2, //pendiente
                    'descripcion_id' => null
                ]);
                $historialDemanda->save();
            }
        }

        return redirect()->route('beneficiario.show', ['id' => $beneficiario->id]);
    }

    /**
     * Show the form for finding a resourse
     *
     * @return Response
     */
    public function find()
    {
        return view('beneficiario.find');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $persona = Beneficiario::find($id);

        return view('beneficiario.show', compact('persona'))
            ->with(compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //Lista de Paises
        $paises = Pais::get();

        //Lista de Estados Civiles
        $estados_civiles = EstadoCivil::get();

        //Situacin actual, cesante, estudiante, etc...
        $situaciones = Ocupacion::get();

        //Niveles de educacion, basico, universitario, etc...
        $niveles_educacion = Educacion::get();

        //Dependencias del paciente
        $dependencias = TipoDependencia::get();

        //tramos de fonasa
        $fonasa = Fonasa::get();
        //organizaciones isapre
        $isapre = Isapre::get();

        $tipo_discapacidades = TipoDiscapacidad::get();

        $previsiones = Prevision::get();
        //sistemas de protección: chisol/sof, vehiculos, calle, chile crece contigo
        $datos_sociales = SistemaProteccion::get();

        $organizaciones_sociales = OrganizacionSocial::get();

        $beneficios = Beneficio::get();

        $persona = Beneficiario::find($id);

        $infoSocial = DatoSocial::find($id);

        //carga datos de la tabla datos_sociales para beneficiario a editar.


        return view('beneficiario.edit')
            ->with(compact('paises'))
            ->with(compact('estados_civiles'))
            ->with(compact('previsiones'))
            ->with(compact('situaciones'))
            ->with(compact('niveles_educacion'))
            ->with(compact('dependencias'))
            ->with(compact('fonasa'))
            ->with(compact('tipo_discapacidades'))
            ->with(compact('isapre'))
            ->with(compact('datos_sociales'))
            ->with(compact('organizaciones_sociales'))
            ->with(compact('beneficios'))
            ->with(compact('persona'))
            ->with(compact('infoSocial'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Request $request)
    {
        //$this->validate($request, [
        //    'rut' => 'required|exists:beneficiarios,rut|rut'
        //], $this->messages($request));

        // Validate Fields
        $this->validate($request, $this->rules($request), $this->messages($request));

        $beneficiario = Beneficiario::where('rut', $request->input('rut'))->first();

        // General information update
        $beneficiario->update([
            'nombre' => strtolower($request->input('nombres')),
            'apellido' => strtolower($request->input('apellidos')),
            'fecha_nacimiento' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('fecha_nacimiento')))),
            'sexo' => strtolower($request->input('sexo')),
            'rut' => $request->input('rut'),
            'pais_id' => $request->input('id_pais'),
            'estado_civil_id' => $request->input('estado_civil'),
            'educacion_id' => $request->input('educacion'),
            'ocupacion_id' => $request->input('ocupacion'),
            'email' => $request->input('email'),
        ]);

        // TelefonoBeneficiario Update
        if ($request->input('tel_fijo')) {
            if ($beneficiario->telefonos->where('tipo', 'fijo')->first()) {
                $beneficiario->telefonos->where('tipo', 'fijo')->first()->update([
                    'numero' => $request->input('tel_fijo'),
                    'tipo' => 'fijo',
                ]);
            } else {
                $telefonoFijo = new TelefonoBeneficiario([
                    'numero' => $request->input('tel_fijo'),
                    'tipo' => 'fijo',
                    'beneficiario_id' => $beneficiario->id
                ]);
                $telefonoFijo->save();
            }
        } elseif ($beneficiario->telefonos->where('tipo', 'fijo')->first() != null) {
            $beneficiario->telefonos->where('tipo', 'fijo')->first()->delete();
        }

        // TelefonoBeneficiario Update (Movil)
        if ($request->input('tel_movil')) {
            if ($beneficiario->telefonos->where('tipo', 'movil')->first()) {
                $beneficiario->telefonos->where('tipo', 'movil')->first()->update([
                    'numero' => $request->input('tel_movil'),
                    'tipo' => 'movil',
                ]);
            } else {
                $telefonoMovil = new TelefonoBeneficiario([
                    'numero' => $request->input('tel_movil'),
                    'tipo' => 'movil',
                    'beneficiario_id' => $beneficiario->id
                ]);
                $telefonoMovil->save();
            }
        } elseif ($beneficiario->telefonos->where('tipo', 'movil')->first() != null) {
            $beneficiario->telefonos->where('tipo', 'movil')->first()->delete();
        }

        // CredencialDiscapacidad Update
        if ($request->input('credencial_discapacidad') != 0) {
            if ($request->input('credencial_discapacidad') == 2) {
                if ($beneficiario->credencial_discapacidad != null) {
                    $beneficiario->credencial_discapacidad->update([
                        'fecha_vencimiento' => null,
                        'en_tramite' => true,
                    ]);
                } else {
                    $credeDic = new CredencialDiscapacidad([
                        'fecha_vencimiento' => null,
                        'en_tramite' => true,
                        'beneficiario_id' => $beneficiario->id
                    ]);
                    $credeDic->save();
                }
            } elseif ($request->input('credencial_discapacidad') == 1) {
                if ($beneficiario->credencial_discapacidad != null) {
                    $beneficiario->credencial_discapacidad->update([
                        'fecha_vencimiento' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('credencial_vencimiento')))),
                        'en_tramite' => false,
                    ]);
                } else {
                    $credeDic = new CredencialDiscapacidad([
                        'fecha_vencimiento' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('credencial_vencimiento')))),
                        'en_tramite' => false,
                        'beneficiario_id' => $beneficiario->id
                    ]);
                    $credeDic->save();
                }
            }
        } elseif ($request->input('credencial_discapacidad') == 0 && $beneficiario->credencial_discapacidad != null) {
            $beneficiario->credencial_discapacidad->delete();
        }

        // RegistroSocialHogar Update
        if ($request->input('registro_social_hogares') != 0) {
            if ($request->input('registro_social_hogares') == 2) {
                if ($beneficiario->registro_social_hogar != null) {
                    $beneficiario->registro_social_hogar->update([
                        'porcentaje' => null,
                        'en_tramite' => true,
                    ]);
                } else {
                    $regSocHog = new RegistroSocialHogar([
                        'porcentaje' => null,
                        'en_tramite' => true,
                        'beneficiario_id' => $beneficiario->id
                    ]);
                    $regSocHog->save();
                }
            } elseif ($request->input('registro_social_hogares') == 1) {
                if ($beneficiario->registro_social_hogar != null) {
                    $beneficiario->registro_social_hogar->update([
                        'porcentaje' => $request->input('registro_social_porcentaje'),
                        'en_tramite' => false,
                    ]);
                } else {
                    $regSocHog = new RegistroSocialHogar([
                        'porcentaje' => $request->input('registro_social_porcentaje'),
                        'en_tramite' => false,
                        'beneficiario_id' => $beneficiario->id
                    ]);
                    $regSocHog->save();
                }
            }
        } elseif ($request->input('registro_social_hogares') == 0 && $beneficiario->registro_social_hogar != null) {
            $beneficiario->registro_social_hogar->delete();
        }

        // Domicilio Update
        if ($request->input('domicilio_calle')) {
            if ($beneficiario->domicilio != null) {
                $beneficiario->domicilio->update([
                    'pobl_vill' => $request->input('domicilio_poblacion'),
                    'calle' => $request->input('domicilio_calle'),
                    'numero' => $request->input('domicilio_numero'),
                    'bloque' => $request->input('domicilio_block'),
                    'numero_depto' => $request->input('domicilio_numero_dpto'),
                ]);
            } else {
                $domicilio = new Domicilio([
                    'pobl_vill' => $request->input('domicilio_poblacion'),
                    'calle' => $request->input('domicilio_calle'),
                    'numero' => $request->input('domicilio_numero'),
                    'bloque' => $request->input('domicilio_block'),
                    'numero_depto' => $request->input('domicilio_numero_dpto'),
                    'beneficiario_id' => $beneficiario->id,
                ]);
                $domicilio->save();
            }
        } elseif ($beneficiario->domicilio != null) {
            $beneficiario->domicilio->delete();
        }

        /*
        * If conditions chage on future and the stakeholders want to delete the
        * constrait of "Must Have" in the relation Beneficiario->Tutor. At the
        * moment, is blocked by the validations.
        * Tutor Update
        */
        if ($request->input('nombre_tutor') || $request->input('apellido_tutor')) {
            if ($beneficiario->tutor != null) {
                $beneficiario->tutor->update([
                    'nombre' => $request->input('nombre_tutor'),
                    'apellido' => $request->input('apellido_tutor'),
                ]);
            } else {
                $tutor = new Tutor([
                    'nombre' => $request->input('nombre_tutor'),
                    'apellido' => $request->input('apellido_tutor'),
                    'beneficiario_id' => $beneficiario->id
                ]);
                $tutor->save();
            }
        } elseif ($beneficiario->tutor != null) {
            $beneficiario->tutor->delete();
        }

        // TelefonoTutor Update
        if ($request->input('nombre_tutor') || $request->input('apellido_tutor')) {
            if ($request->input('telefono_tutor')) {
                if ($beneficiario->tutor->telefonos->first() != null) {
                    $beneficiario->tutor->telefonos->first()->update([
                        'numero' => $request->input('telefono_tutor'),
                    ]);
                } else {
                    $telefonoTutor = new TelefonoTutor([
                        'numero' => $request->input('telefono_tutor'),
                        'tutor_id' => $beneficiario->tutor->id
                    ]);
                    $telefonoTutor->save();
                }
            } elseif ($beneficiario->tutor->telefonos->first() != null) {
                $beneficiario->tutor->telefonos->first()->delete();
            }
        }

        // DatoSocial Update
        $arrDatoSocial['observacion'] = $request->input('observacion_general');


        // TODO: Sistema de salud


        $arrDatoSocial['prevision_id'] = $request->input('prevision');
        $arrDatoSocial['sistema_proteccion_id'] = $request->input('sistema_proteccion');

        //$arrDatoSocial['ficha_beneficiario_id'] = $fichaBeneficiario->id;
        //$arrDatoSocial['observacion'] = $request->input('observacion_general');

        if ($request->input('sistema_salud') && $request->input('sistema_salud') == 'fonasa') {
            $arrDatoSocial['fonasa_id'] = $request->input('fonasa');
            $arrDatoSocial['isapre_id'] = null;
        } elseif ($request->input('sistema_salud') && $request->input('sistema_salud') == 'isapre') {
            $arrDatoSocial['isapre_id'] = $request->input('isapre');
            $arrDatoSocial['fonasa_id'] = null;
        }


        $beneficiario->ficha_beneficiario->dato_social->update($arrDatoSocial);

        // Beneficio Update
        foreach ($beneficiario->ficha_beneficiario->dato_social->beneficios as $beneficio) {
            $beneficio->pivot->delete();
        }

        if ($request->input('beneficios')) {
            foreach ($request->input('beneficios') as $key => $val) {
                if (is_numeric($val)) {
                    $beneficio = Beneficio::find($val);
                    if ($beneficio) {
                        $beneficiario->ficha_beneficiario->dato_social->beneficios()->save($beneficio);
                    }
                } else {
                    $beneficio = new Beneficio([
                        'nombre' => strtolower($val)
                    ]);
                    $beneficio->save();
                    $beneficiario->ficha_beneficiario->dato_social->beneficios()->save($beneficio);
                }
            }
        }

        // OrganizacionSocial Save
        foreach ($beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales as $orgSocial) {
            $orgSocial->pivot->delete();
        }

        if ($request->input('organizaciones_sociales')) {
            foreach ($request->input('organizaciones_sociales') as $key => $val) {
                if (is_numeric($val)) {
                    $organizacionSocial = OrganizacionSocial::find($val);
                    if ($organizacionSocial) {
                        $beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales()->save($organizacionSocial);
                    }
                } else {
                    $organizacionSocial = new OrganizacionSocial([
                        'nombre' => strtolower($val)
                    ]);
                    $organizacionSocial->save();
                    $beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales()->save($organizacionSocial);
                }
            }
        }

        // FichaDiscapacidad Update
        $beneficiario->ficha_beneficiario->ficha_discapacidad->update([
            'requiere_cuidado' => $request->input('cuidados'),
            'diagnostico' => $request->input('diagnostico'),
            'otras_enfermedades' => $request->input('otras_enfermedades'),
            'tipo_dependencia_id' => $request->input('tipo_dependencia')
        ]);

        // TipoDiscapacidad Update
        foreach ($beneficiario->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades as $porcDisc) {
            $porcDisc->delete();
        }

        if ($request->input('tipo_discapacidad')) {
            foreach ($request->input('tipo_discapacidad') as $key => $val) {
                if ($val > 0 && TipoDiscapacidad::find($key)) {
                    $fichaDiscTipoDisc = new fichaDiscTipoDisc([
                        'porcentaje' => $val,
                        'ficha_discapacidad_id' => $beneficiario->ficha_beneficiario->ficha_discapacidad->id,
                        'tipo_discapacidad_id' => $key
                    ]);
                    $fichaDiscTipoDisc->save();
                }
            }
        }

        return redirect()->route('beneficiario.show', ['id' => $beneficiario->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    private function rules(Request $request)
    {
        $rules = [
            'apellidos' => 'required|max:200',
            'apellido_tutor' => 'nullable|required_with:nombre_tutor',
            'credencial_discapacidad' => 'required|numeric|between:0,2',
            'credencial_vencimiento' => 'required_if:credencial_discapacidad,1|date_format:"d/m/Y"|after:"yesterday"',
            'cuidados' => 'required|numeric|between:0,1',
            'domicilio_calle' => 'nullable|max:200',
            'domicilio_numero' => 'nullable|required_with:domicilio_calle|numeric',
            'domicilio_numero_dpto' => 'nullable',
            'domicilio_block' => 'nullable',
            'domicilio_poblacion' => 'nullable',
            'nombres' => 'required|max:200',
            'educacion' => 'required|exists:educacions,id',
            'email' => 'nullable|email',
            'fecha_nacimiento' => 'required|date_format:"d/m/Y"|before:"today"',
            'fonasa' => 'required_if:sistema_salud,fonasa|exists:fonasas,id',
            'isapre' => 'required_if:sistema_salud,isapre|exists:isapres,id',
            'nombre_tutor' => 'nullable|required_with:apellido_tutor',
            'observacion_general' => 'nullable',
            'ocupacion' => 'required|exists:ocupacions,id',
            'otras_enfermedades' => 'nullable',
            'prevision' => 'nullable|exists:previsions,id',
            'registro_social_hogares' => 'required|numeric|between:0,2',
            'registro_social_porcentaje' => 'required_if:registro_social_hogares,1|numeric|between:0,100',
            'sexo' => 'required|in:masculino,femenino',
            'sistema_proteccion' => 'nullable|exists:sistema_proteccions,id',
            'sistema_salud' => 'required|in:fonasa,isapre',
            'tel_fijo' => 'nullable|numeric',
            'tel_movil' => 'nullable|numeric',
            'telefono_tutor' => 'nullable|required_with:nombre_tutor|numeric',
            'tipo_dependencia' => 'required|exists:tipo_dependencias,id',
        ];

        foreach ($request->input('tipo_discapacidad') as $key => $val) {
            $rules['tipo_discapacidad.' . $key] = 'required|numeric|between:0,100';
        }
        return $rules;
    }

    private function messages(Request $request)
    {
        foreach ($request->input('tipo_discapacidad') as $key => $val) {
            $messages['tipo_discapacidad.' . $key . '.between'] = 'Discapacidad ' . $key . ' debe tener un porcentaje menor a :min y mayor que :max.';
        }
        return $messages;
    }

    public function findLikeNombreApellidoRutJson(Request $request)
    {
        $queryLike = $request->input('query') . '%';
        $beneficiarios = Beneficiario::where('rut', 'like', $queryLike)
            ->orWhere('nombre', 'like', $queryLike)
            ->orWhere('apellido', 'like', $queryLike)
            ->orWhereRaw("concat(nombre, ' ', apellido) like ?", [$queryLike])
            ->get()
            ->toArray();
        return response()->json(['beneficiarios' => $beneficiarios]);
    }

    public function findNombrePorRut(Request $request)
    {
        $rutBuscado = $request->input('rutBuscado');
        $beneficiarioEncontrado = Beneficiario::where('rut', $rutBuscado)->first();

        return $beneficiarioEncontrado->toJson();

    }

    /*
    *
    * Esta es tu función Peter. Debes generar un pdf del beneficiario que sea presentable
    *
    */

    public function generatePDF(Request $request, $id)
    {
        $beneficiario = Beneficiario::find($id);
        $pdf = PDF::loadView('beneficiario.pdf', array('beneficiario' => $beneficiario));
        return $pdf->download('beneficiario.pdf');
    }

    /**
     * Muestra una lista de pacientes en espera.
     *
     */
    public function listaEspera($id)
    {
        $id_demanda = $id;
        $estados = Estado::get();
        $descripciones = Descripcion::get();
        $demanda_beneficiarios = DemandaBeneficiario::where('demanda_id', $id_demanda)->orderBy('created_at', 'asc')->get();

        return view('lista-espera.show')
            ->with(compact('id_demanda'))
            ->with(compact('estados'))
            ->with(compact('descripciones'))
            ->with(compact('demanda_beneficiarios'));
    }

    public function gethistorialdemanda(Request $request)
    {
        $id = $request->input('demanda_beneficiario_id');
        $eventos = array();

        $historial_demanda = HistorialDemanda::where('demanda_beneficiario_id', $id)->orderBy('created_at', 'desc')->get();

        foreach ($historial_demanda as $registro) {
            $e = array();
            $e['id'] = $registro->id;
            $e['demanda_beneficiario_id'] = $registro->demanda_beneficiario_id;

            $fecha = new \DateTime($registro->created_at);
            $e['fecha'] = $fecha->format('Y-m-d H:i');
            $e['descripcion'] = "Registro Inicial";

            if ($registro->descripcion()->first() == null) {
                $e['descripcion'] = "Registro Inicial";
            } else {
                $descripcion = $registro->descripcion()->first()->nombre;
                $e['descripcion'] = $descripcion;
            }
            $estado = $registro->estado()->first()->nombre;
            $e['estado'] = $estado;
            array_push($eventos, $e);
        }

        return json_encode($eventos);
    }

    public function guardarHistorialDemanda(Request $request)
    {
        $demanda_beneficiari_id = $request->input('demanda_beneficiario_id');
        $estado_id = $request->input('estado_id');
        $descripcion_id = $request->input('descripcion_id');

        if($estado_id ==1){
            $descripcion_id =4;
        }

        $historial_demanda = new HistorialDemanda([
            'demanda_beneficiario_id' => $demanda_beneficiari_id,
            'estado_id' => $estado_id,
            'descripcion_id' => $descripcion_id
        ]);
        $historial_demanda->save();

    }

    public function demandas()
    {
        $demandas = Demanda::get();
        $success = null;
        return view('lista-espera.showTipoDemandas')
            ->with(compact('demandas'))
            ->with(compact('success'));
    }

    public function createDemanda()
    {
        return view('lista-espera.create');
    }

    public function storeDemanda(Request $request)
    {
        $v = Validator::make($request->all(), [
            'nombre' => 'required|unique:demandas'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $nombre = $request->input('nombre');
        $demanda = new Demanda([
            'nombre' => strtoupper($nombre)
        ]);

        $demanda->save();
        return redirect()->back()->with('message', 'Registro almacenado con éxito!');
    }

    public function editDemanda($id)
    {
        $nombre = Demanda::where('id', $id)->first()->nombre;

        return view('lista-espera.edit')
            ->with(compact('id'))
            ->with(compact('nombre'));
    }

    public function updateDemanda(Request $request)
    {


        $v = Validator::make($request->all(), [
            'nombre' => 'required|unique:demandas'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


        $nombre = $request->input('nombre');
        $id = $request->input('id');

        $demanda = Demanda::where('id', $id)->first();

        $demanda->update([
            'nombre' => strtoupper($nombre)
        ]);

        $demanda->save();

        return redirect()->back()->with('message', 'Registro actualizado con éxito!');
    }

    public function deleteDemanda($id)
    {
        $demanda = Demanda::find($id);
        $demanda->delete();

        return redirect()->back()->with('message', 'Registro eliminado con éxito!');
    }

    public function createRegistro($id)
    {
        $demanda_beneficiario_id=$id;
        $demaBene=DemandaBeneficiario::where('id',$id)->first();
        $beneficiario = Beneficiario::where('id',$demaBene->beneficiario_id)->first();
        $demanda = Demanda::where('id',$demaBene->demanda_id)->first();
        $descripciones = Descripcion::get();
        $estados = Estado::get();

        return view('lista-espera.createRegistroEstado')
            ->with(compact('demanda_beneficiario_id'))
            ->with(compact('demanda'))
            ->with(compact('estados'))
            ->with(compact('beneficiario'))
            ->with(compact('descripciones'));

    }

}
