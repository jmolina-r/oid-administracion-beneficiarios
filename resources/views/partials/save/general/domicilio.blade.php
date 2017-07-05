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
		        	@endif
		        	>
		        	<div class="help-block with-errors">
		    		</div>
			    </div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class='form-group'>
			    <input name='domicilio_numero' class='form-control onlynumbers' id='domicilio_numero' placeholder='Número' type='text' value=
			    @if(old('domicilio_numero'))
			    	"{{ old('domicilio_numero') }}"
			    @elseif(isset($persona) && $persona->domicilio->numero !=null)
			    	"{{$persona->domicilio->numero}}"
			    @else
			    	""
			   	@endif
			   	>
			    <div class="help-block with-errors">
			    </div>
			</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class='form-group'>
			    <input name='domicilio_block' class='form-control' id='domicilio_block' placeholder='Block' type='text'
			    value=
			    @if(old('domicilio_block'))
			    	"{{ old('domicilio_block') }}"
			    @elseif(isset($persona) && $persona->domicilio->bloque !=null)
			    	"{{$persona->domicilio->bloque}}"
			    @else
			    	""
			   	@endif
			    >
			    <div class="help-block with-errors">
			    </div>
			</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='form-group'>                        
			    <div class='controls'>
			        <input name='domicilio_numero_dpto' class='form-control' id='inputText' placeholder='N° Departamento' type='text' value=
			        @if(old('domicilio_numero_dpto'))
				    	"{{ old('domicilio_numero_dpto') }}"
				    @elseif(isset($persona) && $persona->domicilio->numero_depto !=null)
				    	"{{$persona->domicilio->numero_depto}}"
				    @else
				    	""
				   	@endif
			        >
			    </div>
			</div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class='form-group'>
			    <div class='controls'>
			        <input name='domicilio_poblacion' class='form-control' id='inputText' placeholder='Poblacion / Villa' type='text' value=
			        @if(old('domicilio_poblacion'))
				    	"{{ old('domicilio_poblacion') }}"
				    @elseif(isset($persona) && $persona->domicilio->pobl_vill !=null)
				    	"{{$persona->domicilio->pobl_vill}}"
				    @else
				    	""
				   	@endif
			        >
			    </div>
			</div>
        </div>
    </div>
</div>