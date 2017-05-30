<div class="container">
    <div class="row">
        @isset($persona->domicilio)
            <div class="col-md-12">
                <p><span class="tit">Calle de Domicilio</span> <span class="capitalize">{{$persona->domicilio->calle}}</span></p>
                <p><span class="tit">Número de Domicilio</span> {{$persona->domicilio->numero}}</p>

                @isset($persona->domicilio->numero_depto)
                    <p><span class="tit">Número de Departamento</span> <span class="capitalize">{{$persona->domicilio->numero_depto}}</span></p>
                @endisset

                @isset($persona->domicilio->bloque)
                    <p class="capitalize"><span class="tit">Block</span> <span class="capitalize">{{$persona->domicilio->bloque}}</span></p>
                @endisset

                @isset($persona->domicilio->pobl_vill)
                    <p><span class="tit">Población o Villa</span> <span class="capitalize">{{$persona->domicilio->pobl_vill}}</span></p>
                @endisset
            </div>
        @endisset
    </div>
</div>
