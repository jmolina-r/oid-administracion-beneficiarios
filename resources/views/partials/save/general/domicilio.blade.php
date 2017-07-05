<div class='form-group'>
    <label class='control-label' for='inputText'>Domicilio</label>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        	<div class='form-group'>
			    <div class='controls'>                            
			        <input name='domicilio_calle' class='form-control' id='domicilio_calle' placeholder='Calle' type='text' maxlength="200" value=
			        	@if(old('domicilio_calle')) 
			        		"{{ old('domicilio_calle') }}"
			        	@elseif(isset($persona) && $persona->domicilio->calle != null)
			        		"{{$persona->domicilio->calle}}"
			        	@else
			        		""
			        	@endif>
			    </div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class='form-group'>
			    <input name='domicilio_numero' value="{{ old('domicilio_numero') }}" class='form-control onlynumbers' id='domicilio_numero' placeholder='Número' type='text'>
			    <div class="help-block with-errors">
			    </div>
			</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class='form-group'>
			    <input name='domicilio_block' value="{{ old('domicilio_block') }}" class='form-control' id='domicilio_block' placeholder='Block' type='text'>
			    <div class="help-block with-errors">
			    </div>
			</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='form-group'>                        
			    <div class='controls'>
			        <input name='domicilio_numero_dpto' value="{{ old('domicilio_dpto') }}" class='form-control' id='inputText' placeholder='N° Departamento' type='text'>
			    </div>
			</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='form-group'>
			    <div class='controls'>
			        <input name='domicilio_poblacion' value="{{ old('domicilio_poblacion') }}" class='form-control' id='inputText' placeholder='Poblacion / Villa' type='text'>
			    </div>
			</div>
        </div>
    </div>
</div>