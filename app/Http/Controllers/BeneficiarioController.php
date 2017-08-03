<?php

namespace App\Http\Controllers;

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
            ->with(compact('beneficios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rut' => 'required|unique:beneficiarios'
        ], $this->messages($request));

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

        $planDeRehabilitacionTratamientoControl= $request->input('p_reha_trat_ctrl');

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
     * @param  int  $id
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
     * @param  int  $id
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

        $fonasa = Fonasa::get();

        $isapre = Isapre::get();

        $tipo_discapacidades = TipoDiscapacidad::get();

        $previsiones = Prevision::get();

        $datos_sociales = SistemaProteccion::get();

        $organizaciones_sociales = OrganizacionSocial::get();

        $beneficios = Beneficio::get();

        $persona = Beneficiario::find($id);


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
            ->with(compact('persona'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'rut' => 'required|exists:beneficiarios,rut'
        ], $this->messages($request));

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
            if($beneficiario->telefonos->where('tipo', 'fijo')->first()) {
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
        } elseif($beneficiario->telefonos->where('tipo', 'fijo')->first() != null){
            $beneficiario->telefonos->where('tipo', 'fijo')->first()->delete();
        }

         // TelefonoBeneficiario Update (Movil)
        if ($request->input('tel_movil')) {
            if($beneficiario->telefonos->where('tipo', 'movil')->first()) {
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
        } elseif($beneficiario->telefonos->where('tipo', 'movil')->first() != null){
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
        } elseif($request->input('credencial_discapacidad') == 0 && $beneficiario->credencial_discapacidad != null) {
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
        } elseif($request->input('registro_social_hogares') == 0 && $beneficiario->registro_social_hogar != null) {
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
                if($beneficiario->tutor->telefonos->first() != null) {
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
            } elseif($beneficiario->tutor->telefonos->first() != null) {
                $beneficiario->tutor->telefonos->first()->delete();
            }
        }

        // DatoSocial Update
        $arrDatoSocial['observacion'] = $request->input('observacion_general');


        // TODO: Sistema de salud


        $arrDatoSocial['prevision_id'] = $request->input('prevision');
        $arrDatoSocial['sistema_proteccion_id'] = $request->input('sistema_proteccion');

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
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    private function rules(Request $request)
    {
        $rules = [
            'apellidos' => 'required|max:200',
            'apellido_tutor' => 'required',
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
            'nombre_tutor' => 'required',
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
            'telefono_tutor' => 'required_with:nombre_tutor|numeric',
            'tipo_dependencia' => 'required|exists:tipo_dependencias,id',
        ];

        foreach ($request->input('tipo_discapacidad') as $key => $val) {
            $rules['tipo_discapacidad.'.$key] = 'required|numeric|between:0,100';
        }
        return $rules;
    }

    private function messages(Request $request)
    {
        foreach ($request->input('tipo_discapacidad') as $key => $val) {
            $messages['tipo_discapacidad.'.$key.'.between'] = 'Discapacidad '.$key.' debe tener un porcentaje menor a :min y mayor que :max.';
        }
        return $messages;
    }

    public function findLikeNombreApellidoRutJson(Request $request)
    {
        $queryLike = $request->input('query').'%';
        $beneficiarios = Beneficiario::where('rut', 'like', $queryLike)
            ->orWhere('nombre', 'like', $queryLike)
            ->orWhere('apellido', 'like', '%'.$queryLike)
            ->orWhereRaw("concat(nombre, ' ', apellido) like ?", [$queryLike])
            ->get()
            ->toArray();
        return response()->json(['beneficiarios' => $beneficiarios]);
    }

    public function findNombrePorRut(Request $request){
        $rutBuscado = $request->input('rutBuscado');
        $beneficiarioEncontrado = Beneficiario::where('rut', $rutBuscado)->first();

        return $beneficiarioEncontrado->toJson();
    }

    /*
    *
    * Esta es tu función Peter. Debes generar un pdf del beneficiario que sea presentable
    *
    */

    public function generatePDF(Request $request, $id) {
        // Consultas para datos Personales
        // -------------------------------
        // busqueda del pais del beneficiario.
        $idPais = Beneficiario::find($id)->pais_id;
        $nombrePais = Pais::find($idPais)->nombre;
        // busqueda del estado civil del beneficiario.
        $idEstadoCivil = Beneficiario::find($id)->estado_civil_id;
        $situacionEstadoCivil = EstadoCivil::find($idEstadoCivil)->nombre;

        // Consultas para datos sociales
        // -----------------------------
        // busqueda del nivel de educacion del beneficiario.
        $idEducacion = Beneficiario::find($id)->educacion_id;
        $nivelEducativo = Educacion::find($idEducacion)->nombre;
        // busqueda de la ocupacion del beneficiario.
        $idOcupacion = Beneficiario::find($id)->ocupacion_id;
        $ocupacion = Ocupacion::find($idOcupacion)->nombre;
        // busqueda del tramo de fonasa
        $idFonasa =  DatoSocial::find($id)->fonasa_id;
        $tramoFonasa = Fonasa::find($idFonasa)->tramo;
        // busqueda de la prevision
        $idPrevision = DatoSocial::find($id)->prevision_id;
        $tipoPrevision = Prevision::find($idPrevision)->nombre;

        $pdf = PDF::loadHTML
        ('<h1>'.'Información del Beneficiario'.'</h1>'.
            '<hr>'.'<h2>'.'Datos Personales'.'</h2>'.'</hr>'.
            'Nombre: '.Beneficiario::find($id)->nombre.'<br/>'.
            'Apellido: '.Beneficiario::find($id)->apellido.'<br/>'.
            'Rut: '.Beneficiario::find($id)->rut.'<br/>'.
            'Fecha de Nacimiento: '.Beneficiario::find($id)->fecha_nacimiento.'<br/>'.
            'Genero: '.Beneficiario::find($id)->sexo.'<br/>'.
            'Pais de Origen: '.$nombrePais.'<br/>'.
            'Situación Civil: '.$situacionEstadoCivil.'<br/>'.
            '<h2>'.'Ubicación'.'</h2>'.
            'Calle de Domicilio: '.Domicilio::find($id)->calle.'<br/>'.
            'Número de Domicilio: '.Domicilio::find($id)->numero.'<br/>'.
            'Número de Departamento: '.Domicilio::find($id)->numero_depto.'<br/>'.
            'Block: '.Domicilio::find($id)->bloque.'<br/>'.
            'Población o Villa: '.Domicilio::find($id)->pobl_vill.'<br/>'.
            '<h2>'.'Datos de Contacto'.'</h2>'.
            'Teléfono de Red Fija: '.'<br/>'.
            'Teléfono Celular: '.'<br/>'.
            'Correo Electrónico: '.Beneficiario::find($id)->email.'<br/>'.
            '<h2>'.'Datos Sociales'.'</h2>'.
            'Tramo Fonasa: '.$tramoFonasa.'<br/>'.
            'Previsión: '.$tipoPrevision.'<br/>'.
            'Nivel Educacional: '.$nivelEducativo.'<br/>'.
            'Ocupación: '.$ocupacion.'<br/>'.
            'Porcentaje Registro Social de Hogares: '.RegistroSocialHogar::find($id)->porcentaje.'%'.'<br/>'.
            '<h2>'.'Datos Tutor'.'</h2>'.
            'Nombre Completo: '.Tutor::find($id)->nombre.' '.Tutor::find($id)->apellido.'<br/>'.
            '<h2>'.'Observaciones'.'</h2>'.
            'Observaciones Generales: '.'<br/>'

        );

        return $pdf->download('invoice.pdf');
    }
}
