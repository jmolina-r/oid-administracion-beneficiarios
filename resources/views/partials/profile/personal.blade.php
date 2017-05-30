<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="capitalize"><span class="tit">Nombre Completo</span> {{ $persona->nombre }} {{ $persona->apellido }}</p>
            @isset($persona->rut)
                <p class="capitalize"><span class="tit">Rut</span> {{ $persona->rut }}</p>
            @endisset

            @isset($persona->sexo)
                <p class="capitalize"><span class="tit">Genero</span> {{ $persona->sexo }}</p>
            @endisset

            @isset($persona->fecha_nacimiento)
                <p><span class="tit">Fecha de Nacimiento</span> {{ date('d/m/Y', strtotime($persona->fecha_nacimiento)) }}</p>
            @endisset

            @isset($persona->estado_civil)
                <p class="capitalize"><span class="tit">Situación Civil</span> {{ $persona->estado_civil->nombre }}</p>
            @endisset

            @isset($persona->pais)
                <p><span class="tit">País de Origen</span> <span class="capitalize">{{ $persona->pais->nombre }}</span></p>
            @endisset
        </div>
    </div>
</div>
