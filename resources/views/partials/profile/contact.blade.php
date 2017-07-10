<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @isset($persona->telefonos)
                @foreach ($persona->telefonos as $telefono)
                    <p><i class="fa fa-{{ $telefono->tipo == "fijo" ? "phone" : "mobile" }}"></i> {{ $telefono->tipo == "fijo" ? "+56" : "+56 9" }} {{$telefono->numero}} </p>
                @endforeach
            @endisset
            @isset($persona->email)
                <p><i class="fa fa-envelope" aria-hidden="true"></i> {{$persona->email}}</p>
            @endisset
        </div>
    </div>
</div>
