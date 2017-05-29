<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="capitalize"><span class="tit">Nombre Completo</span> {{$persona->nombre}} {{$persona->apellido}}</p>
            <p class="capitalize"><span class="tit">Rut</span> {{$persona->rut}}</p>
            <p class="capitalize"><span class="tit">Genero</span> {{$persona->sexo}}</p>
            <p class="capitalize"><span class="tit">Fecha de Nacimiento</span> {{$persona->fecha_nacimiento}}</p>
            <p><span class="tit">País de Origen</span> <span class="capitalize">{{$persona->pais->nombre}}</span></p>
        </div>
    </div>
</div>
