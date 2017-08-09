<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>

        <style media="screen">
            .capitalize:{
                text-transform: capitalize;
            }
            h1:{
                color: #08088A;
                font-size: 300%
            }
            h2:{
                color: #0404B4;
                font-size: 200%
            }
            #observaciones,#datosTutor,#datosDiscapacidad,#datosContacto,#datosSociales,#datosUbicacion,#datosPersonales:{
                line-height: 10px
            }

        </style>
    </head>
    <body>
        <h1>Información del Beneficiario</h1>
        <hr>
        <h2>Datos Personales</h2>
        <section id="datosPersonales">
            <p><strong>Nombre Completo: </strong><span class="capitalize">{{ $beneficiario->nombre }}</span>&nbsp;
                    <span class="capitalize">{{ $beneficiario->apellido }}</span></p>
            <p><strong>Rut: </strong> <span class="capitalize">{{ $beneficiario->rut }}</span></p>
            <!-- Debes formatear la fecha, el formato que utiliza Chile -->
            <p><strong>Fecha de Nacimiento: </strong>{{ date('d/m/Y', strtotime($beneficiario->fecha_nacimiento)) }}</p>
            <p><strong>Genero: </strong> <span class="capitalize">{{ $beneficiario->sexo }}</span></p>
            <p><strong>Pais de Origen: </strong> <span class="capitalize">{{ $beneficiario->pais->nombre }}</span></p>
            <p><strong>Situación Civil: </strong> <span class="capitalize">{{ $beneficiario->estado_civil->nombre }}</span></p>
        </section>

        @isset($beneficiario->domicilio->calle)
            <h2>Ubicación</h2>
            <section id="datosUbicacion">            
                <p><strong>Calle de Domicilio: </strong><span class="capitalize">{{$beneficiario->domicilio->calle}}</span></p>
                @isset($beneficiario->domicilio->numero)
                    <p><strong>Número de Domicilio: </strong>{{$beneficiario->domicilio->numero}}</p>
                @endisset
                @isset($beneficiario->domicilio->numero_depto)
                    <p><strong>Número de Departamento: </strong>{{$beneficiario->domicilio->numero_depto}}</p>
                @endisset
                @isset($beneficiario->domicilio->bloque)
                    <p><strong>Bloque: </strong>{{$beneficiario->domicilio->bloque}}</p>
                @endisset
                @isset($beneficiario->domicilio->pobl_vill)
                    <p><strong>Población o Villa: </strong><span class="capitalize">{{$beneficiario->domicilio->pobl_vill}}</span></p>
                @endisset
            </section>
        @endisset

        @if(@isset($beneficiario->telefonos) || @isset($beneficiario->email))
            <h2>Datos de Contacto</h2>
            <section id="datosContacto">
                @isset($beneficiario->telefonos)
                    @foreach ($beneficiario->telefonos as $telefono)
                        <p><strong>{{ $telefono->tipo == "fijo" ? "Teléfono de Red Fija: " : "Teléfono Celular: " }}</strong> {{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}} </p>
                    @endforeach
                @endisset

                @isset($beneficiario->email)
                    <p><strong>Correo Electrónico:</strong><span class="capitalize">{{$beneficiario->email}}</span></p>
                @endisset
            </section>
        @endisset

        <h2>Datos Sociales</h2>
        <section id="datosSociales">
            @isset($beneficiario->ficha_beneficiario->dato_social->isapre)
                <p><strong>Isapre: </strong>
                    <span class="capitalize">{{$beneficiario->ficha_beneficiario->dato_social->isapre->organizacion}}
                    </span>
                </p>
            @endisset

            @isset($beneficiario->ficha_beneficiario->dato_social->fonasa)
                <p><strong>Tramo Fonasa: </strong>
                    <span class="capitalize">{{$beneficiario->ficha_beneficiario->dato_social->fonasa->tramo}}
                    </span>
                </p>
            @endisset

            @isset($beneficiario->ficha_beneficiario->dato_social->prevision)
                <p><strong>Previsión: </strong>
                    <span class="capitalize">{{$beneficiario->ficha_beneficiario->dato_social->prevision->nombre}}
                    </span>
                </p>
            @endisset

            <p><strong>Nivel Educacional: </strong><span class="capitalize">{{$beneficiario->educacion->nombre}}</span></p>
            <p><strong>Ocupación: </strong><span class="capitalize">{{$beneficiario->ocupacion->nombre}}</span></p>
            
            @if(isset($beneficiario->ficha_beneficiario->dato_social->beneficios) && count($beneficiario->ficha_beneficiario->dato_social->beneficios) > 0)
                <p>
                    <strong>Beneficios: </strong>
                    @foreach ($beneficiario->ficha_beneficiario->dato_social->beneficios as $beneficio)
                        <span class="capitalize">{{ $beneficio->nombre }}</span>
                    @endforeach
                </p>
            @endif

            @isset($beneficiario->ficha_beneficiario->dato_social->sistema_proteccion)
                <p>
                    <strong>Sistema de Protección: </strong>
                    <span class="capitalize">{{$beneficiario->ficha_beneficiario->dato_social->sistema_proteccion->nombre}}</span>
                </p>
            @endisset

            @if(isset($beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales) && count($beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales) > 0)
                <p>
                    <strong>Organizaciones Sociales: </strong>
                    @foreach ($beneficiario->ficha_beneficiario->dato_social->organizaciones_sociales as $organizacione_social)
                        <span class="capitalize">{{ $organizacione_social->nombre }}</span>
                    @endforeach
                </p>
            @endif


            @isset($beneficiario->registro_social_hogar)
                <p>
                    @if($beneficiario->registro_social_hogar->en_tramite === 1)
                        <strong>Registro Social de Hogares: </strong> <span class="capitalize">En Trámite</span>
                    @else
                        @isset($beneficiario->registro_social_hogar->porcentaje)
                            <strong>Porcentaje Registro Social de Hogares: </strong><span class="capitalize">{{ $beneficiario->registro_social_hogar->porcentaje }}%</span>
                        @endisset
                    @endif
                </p>
            @endisset

            @isset($beneficiario->credencial_discapacidad)
            <p>
                @if($beneficiario->credencial_discapacidad->en_tramite === 1)
                    <strong>Credencial de Discapacidad</strong>
                    <span class="capitalize">En Trámite</span>
                @else
                    @isset($beneficiario->credencial_discapacidad->fecha_vencimiento)
                        <strong>Vencimiento Credencial de Discapacidad: </strong>
                        <span class="capitalize">{{ date('d/m/Y', strtotime($beneficiario->credencial_discapacidad->fecha_vencimiento)) }}</span>
                    @endisset
                @endif
            </p>
            @endisset
        </section>

        <h2>Datos de Discapacidad</h2>
        <section id="datosDiscapacidad">
                @if(isset($beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico) || isset($beneficiario->ficha_beneficiario->ficha_discapacidad->otras_enfermedades))
                <p>
                    @isset($beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico)
                        <strong>Diagnóstico Médico: </strong>
                        <span class="capitalize">{{ $beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico }}</span>
                    @endisset
                </p>
                <p>
                    @isset($beneficiario->ficha_beneficiario->ficha_discapacidad->otras_enfermedades)
                        <strong>Otras Enfermedades</strong>
                        <span class="capitalize">{{ $beneficiario->ficha_beneficiario->ficha_discapacidad->otras_enfermedades }}</span>
                    @endisset
                </p>
                @endif

                @if(isset($beneficiario->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades) && count($beneficiario->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades) > 0)
                    <p>
                        <strong>Porcentajes de Discapacidades: </strong><br><br>
                        @foreach ($beneficiario->ficha_beneficiario->ficha_discapacidad->porcentaje_discapacidades as $discapacidad)
                            <span class="capitalize"> {{ $discapacidad->tipo_discapacidad->nombre }} {{ $discapacidad->porcentaje }}%</span>
                        @endforeach
                    </p>
                @endif

                @isset($beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico)
                    <p>
                        <strong>Diagnóstico Médico: </strong>
                        <span class="capitalize">{{$beneficiario->ficha_beneficiario->ficha_discapacidad->diagnostico}}</span>
                    </p>
                @endisset 

                @if($beneficiario->ficha_beneficiario->ficha_discapacidad->requiere_cuidado === 1)
                    <p><strong>Requiere Cuidados de Tercero: </strong> Si</p>
                @else
                    <p><strong>Requiere Cuidados de Tercero: </strong> No</p>
                @endif
                <p><strong>Tipo de Dependencia: </strong><span class="capitalize">{{$beneficiario->ficha_beneficiario->ficha_discapacidad->tipo_dependencia->nombre}}</span></p>
        </section>

        <h2>Datos Tutor</h2>
        <section id="datosTutor">
            <p><strong>Nombre Completo: </strong><span class="capitalize">{{ $beneficiario->tutor->nombre }}</span>&nbsp;
                <span class="capitalize">{{ $beneficiario->tutor->apellido }}</span></p>
            @foreach ($beneficiario->tutor->telefonos as $telefono)
                <p><strong>{{ $telefono->tipo == "fijo" ? "Teléfono de Red Fija: " : "Teléfono Celular: " }}</strong> {{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}} </p>
            @endforeach
        </section>

        <h2>Observaciones</h2>
        <section id="observaciones">
            @isset($beneficiario->ficha_beneficiario->dato_social->observacion)
                <p>
                    <strong>Observación General: </strong><br><br>
                    <span class="capitalize">{{$beneficiario->ficha_beneficiario->dato_social->observacion}}</span>
                </p>
            @endisset
        </section>
    </body>
</html>
