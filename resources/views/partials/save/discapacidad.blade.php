<div class='step-pane' data-step='3'>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('partials.save.discapacidad.tipo-discapacidad')
    </div>

    <div class='col-md-12'>
        @include('partials.save.discapacidad.diagnostico-medico')
    </div>

    <div class='col-md-12'>
        @include('partials.save.discapacidad.otras-enfermedades')
    </div>

    <div class="col-md-12 col-lg-4">
        @include('partials.save.discapacidad.dependencia')
    </div>


    <div class="col-md-12 col-lg-3">
        @include('partials.save.discapacidad.cuidado-terceros')
    </div>

    <div class='col-md-12 col-lg-5'>
        @include('partials.save.discapacidad.plan-rehabilitacion')
    </div>

    @if(!isset($persona))
    <div class='col-md-12'>
        @include('partials.save.discapacidad.lista-espera')
    </div>
    @endif



</div>