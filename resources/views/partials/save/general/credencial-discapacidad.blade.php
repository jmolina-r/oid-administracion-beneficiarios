<div class="form-group">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label class='control-label' for='inputSelect'>
            Credencial de discapacidad
        </label>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class='form-group'>
                <select style="width:100%;" name='credencial_discapacidad' class='form-control select-tag' id='credencial_discapacidad' required>
                   <option value="0" {{ old('credencial_discapacidad') == "0" ? "selected" : ""}}>No</option>
                   <option value="2" {{ old('credencial_discapacidad') == "2" ? "selected" : ""}}>En trámite</option>
                   <option value="1" {{ old('credencial_discapacidad') == "1" ? "selected" : ""}}>Si</option>
                </select>
            </div>
        </div>
        {{old('credencial_vencimiento')}}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <div class='input-group' id='credencial_venc'>
                    <input value-date=
                    @if(old('credencial_vencimiento') != null)
                        "{{ old('credencial_vencimiento') }}"
                    @elseif(isset($persona))
                        "{{ $persona->credencial_discapacidad->fecha_vencimiento }}"
                    @else
                        ""
                    @endif
                    name='credencial_vencimiento' class='form-control' data-format='DD/MM/YYYY' placeholder='Vencimiento' type='text' id="credencial_vencimiento" disabled>
                    <span class='input-group-addon'>
                        <span class='fa fa-calendar'></span>
                    </span>
                </div>
                <div class="help-block with-errors">
                </div>
            </div>
        </div>
    </div>
</div>
