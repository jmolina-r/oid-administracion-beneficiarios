<div class="container">
    <div class="row">
        @isset($persona->domicilio)
            <div class="col-md-12">
                <p><span class="tit">Calle de Domicilio</span><br> <span class="capitalize">{{$persona->domicilio->calle}}</span><br></p>
                <p><span class="tit">Número de Domicilio</span><br> {{$persona->domicilio->numero}}</p>

                @isset($persona->domicilio->numero_depto)
                    <p><span class="tit">Número de Departamento</span><br> <span class="capitalize">{{$persona->domicilio->numero_depto}}</span><br></p>
                @endisset

                @isset($persona->domicilio->bloque)
                    <p class="capitalize"><span class="tit">Block</span><br> <span class="capitalize">{{$persona->domicilio->bloque}}</span><br></p>
                @endisset

                @isset($persona->domicilio->pobl_vill)
                    <p><span class="tit">Población o Villa</span><br> <span class="capitalize">{{$persona->domicilio->pobl_vill}}</span></p>
                @endisset
            </div>
        @endisset
    </div>
</div>
