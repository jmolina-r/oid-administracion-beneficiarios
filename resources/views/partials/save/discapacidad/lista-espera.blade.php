<div class="form-group">
    <label class='control-label' for='demanda'>Demanda inicial del beneficiario</label>
    <div class='col-md-12 controls'>
        @foreach($demandas as $demanda)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$demanda->id}}" name="demandaCheckbox[]">
            <label class="form-check-label" for="defaultCheck1">
                {{$demanda->nombre}}
            </label>
        </div>
        @endforeach
    </div>
</div>