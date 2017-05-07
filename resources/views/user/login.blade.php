@extends('layouts.master')

@section('title')
    Login - OID
@endsection

@section('body-attr')
    class='contrast-red login contrast-background'
@endsection

@section('content')
      <div class='middle-container'>
        <div class='middle-row'>
          <div class='middle-wrapper'>
            <div class='login-container-header'>
              <div class='container'>
                <div class='row'>
                  <div class='col-sm-12'>
                    <div class='text-center'>
                        <h1 style="color:white"> <3 OID Antofagasta </h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class='login-container'>
              <div class='container'>
                <div class='row'>
                  <div class='col-sm-4 col-sm-offset-4'>
                    <h1 class='text-center title'>Ingreso al mejor sistema de la vida</h1>
                    <form action='' class='validate-form' method='get'>
                      <div class='form-group'>
                        <div class='controls with-icon-over-input'>
                          <input type="email" value="" placeholder="E-mail" class="form-control" data-rule-required="true" />
                          <i class='fa fa-user text-muted'></i>
                        </div>
                      </div>
                      <div class='form-group'>
                        <div class='controls with-icon-over-input'>
                          <input type="password" value="" placeholder="Contraseña" class="form-control" data-rule-required="true" />
                          <i class='fa fa-lock text-muted'></i>
                        </div>
                      </div>
                      <button class='btn btn-block'>Ingresar!</button>
                    </form>
                    <div class='text-center'>
                      <hr class='hr-normal'>
                      <a href='forgot_password.html'>¿Olvidaste tu contraseña?</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
