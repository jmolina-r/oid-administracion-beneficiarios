<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
    Agendar Hora
</button>
<form role="form" id="formulario-agendar-hora" action="{{route('malla.store')}}" accept-charset="UTF-8"
      style="margin-bottom: 0;" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Agendar Hora</h3>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" id="formulario-agendar-hora" action="{{route('malla.store')}}">
                        {{ csrf_field() }}
                        <div class="form-inline form-group">
                            <div class="form-group">
                                <label for="fecha" class="col-form-label">Fecha: </label>
                                <input type="text" class="form-control" id="fecha" placeholder="" value="12" readonly>
                            </div>
                            <div class="form-group">
                                <label for="hora" class="col-form-label">Hora:</label>
                                <input type="text" class="form-control" id="hora" placeholder="" value="12" readonly>

                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Repetir semanalmente
                                </label>
                            </div>
                        </div>
                        <div class="form-inline form-group">
                            <label for="sesiones" class="col-form-label">Cantidad de sesiones:</label>
                            <input type="text" class="form-control" id="seseiones" value="">

                        </div>
                        <!--
                        <div class="form-inline form-group">
                            <label for="addPrestacion" class="col-form-label">Seleccionar prestación:</label>
                            <select class="form-control" id="addPrestacion" value="">
                                <option>a</option>
                            </select>
                        </div>
                        -->
                        <div class="form-check form-inline">
                            <h4>Tipo de sesión</h4>
                            <label class="form-check-label" for="individual">Individual</label>
                            <input class="form-check-input" type="radio" name="tipo" id="tipo" value="individual"
                                   checked>
                            <label class="form-check-label" for="exampleRadios1">Grupal</label>
                            <input class="form-check-input" type="radio" name="tipo" id="tipo" value="grupal">

                        </div>

                        <h4>Seleccionar beneficiarios</h4>

                        <div class="form-inline form-group">
                            <label for="addBenefiario" class="col-form-label">Ingresar Rut Beneficiario:</label>
                            <input type="text" class="form-control" id="addBenefiario" value="">

                            <button type="button" class="btn btn-primary">Agregar</button>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    {{ csrf_field() }}
</form>



