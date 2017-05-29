<?php

namespace App\Http\Controllers;

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
        /**
         * Estas son las clecciones vacias de prueba
         * Son las que se deben enviar al fronend a partir de los datos
         * almacenados en la BD
         */

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
        //Log::critical($request->input('beneficios'));
        // Log::critical('La descapacidad'.$request->input('tipo_discapacidad')['2']);
        // 0, 1, or 2. 0 inexistence, 1 exists, 2 waiting.

        // Validate Fields
        $this->validate($request, $this->rules($request), $this->messages($request));

        // $this->validate($request, );




        // Beneficiario Create
        $beneficiario = new Beneficiario([
            'nombre' => strtolower($request->input('nombres')),
            'apellido' => strtolower($request->input('apellidos')),
            'fecha_nacimiento' => date('Y-m-d', strtotime(str_replace('/', '-', $request->input('fecha_nacimiento')))),
            'sexo' => strtolower($request->input('sexo')),
            'rut' => $request->input('rut'),
            'pais_id' => $request->input('id_pais'),
            'estado_civil_id' => $request->input('estado_civil'),
            'educacion_id' => $request->input('educacion'),
            'ocupacion_id' => $request->input('ocupacion')
        ]);
        $beneficiario->save();

        if ($request->input('tel_fijo')) {
            $telefonoFijo = new TelefonoBeneficiario([
                'numero' => $request->input('tel_fijo'),
                'tipo' => 'fijo',
                'beneficiario_id' => $beneficiario->id
            ]);
            $telefonoFijo->save();
        }

        if ($request->input('tel_movil')) {
            $telefonoMovil = new TelefonoBeneficiario([
                'numero' => $request->input('tel_movil'),
                'tipo' => 'movil',
                'beneficiario_id' => $beneficiario->id
            ]);
            $telefonoMovil->save();
        }


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


        $tutor = new Tutor([
            'nombres' => $request->input('nombre_tutor'),
            'apellidos' => $request->input('apellido_tutor'),
            'beneficiario_id' => $beneficiario->id
        ]);
        $tutor->save();

        $telefonoTutor = new TelefonoTutor([
            'numero' => $request->input('telefono_tutor'),
            'tutor_id' => $tutor->id
        ]);
        $telefonoTutor->save();

        $fichaBeneficiario = new FichaBeneficiario([
            'fecha_ingreso' => date('Y-m-d'),
            'beneficiario_id' => $beneficiario->id
        ]);
        $fichaBeneficiario->save();

        // Dato social
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

        // Beneficios
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

        // Organizaciones sociales
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

        $fichaDiscapacidad = new FichaDiscapacidad([
            'requiere_cuidado' => $request->input('cuidados'),
            'diagnostico' => $request->input('diagnostico'),
            'otras_enfermedades' => $request->input('otras_enfermedades'),
            'ficha_beneficiario_id' => $fichaBeneficiario->id,
            'tipo_dependencia_id' => $request->input('tipo_dependencia')
        ]);
        $fichaDiscapacidad->save();

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





        $email = $request->input('email');
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
        return view('beneficiario.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function rules(Request $request)
    {
        $rules = [
            'nombres' => 'required|max:200',
            'apellidos' => 'required|max:200',
            'rut' => 'required|unique:beneficiarios',
            'fecha_nacimiento' => 'required|date_format:"d/m/Y"|before:"today"',
            'nombre_tutor' => 'required',
            'apellido_tutor' => 'required',
            'telefono_tutor' => 'required_with:nombre_tutor|numeric',
            'ocupacion' => 'required|exists:ocupacions,id',
            'educacion' => 'required|exists:educacions,id',
            'tel_fijo' => 'nullable|numeric',
            'tel_movil' => 'nullable|numeric',
            'email' => 'nullable|email',
            'credencial_discapacidad' => 'required|numeric|between:0,2',
            //TODO: Validar que sea fecha
            'credencial_vencimiento' => 'required_if:credencial_discapacidad,1|date_format:"d/m/Y"|after:"yesterday"',
            'registro_social_hogares' => 'required|numeric|between:0,2',
            'registro_social_porcentaje' => 'required_if:registro_social_hogares,1|numeric|between:0,100',
            'domicilio_calle' => 'nullable|max:200',
            'domicilio_numero' => 'nullable|required_with:domicilio_calle|numeric',
            'domicilio_numero_dpto' => 'nullable',
            'domicilio_block' => 'nullable',
            'domicilio_poblacion' => 'nullable',
            'sexo' => 'required|in:masculino,femenino',
            'sistema_salud' => 'required|in:fonasa,isapre',
            'fonasa' => 'required_if:sistema_salud,fonasa|exists:fonasas,id',
            'isapre' => 'required_if:sistema_salud,isapre|exists:isapres,id',
            'prevision' => 'nullable|exists:previsions,id',
            'tipo_dependencia' => 'required|exists:tipo_dependencias,id',
            'cuidados' => 'required|numeric|between:0,1',
            'otras_enfermedades' => 'nullable',
            'sistema_proteccion' => 'nullable|exists:sistema_proteccions,id',
            'observacion_general' => 'nullable'
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
}
