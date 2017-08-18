<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoFuncionarioTableSeeder::class);
        $this->call(FuncionarioTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        // $this->call(RoleUserTableSeeder::class);

        $this->call(PaisTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(EducacionTableSeeder::class);
        $this->call(OcupacionTableSeeder::class);
        $this->call(BeneficiarioTableSeeder::class);
        $this->call(TelefonoBeneficiarioTableSeeder::class);
        //$this->call(ProfesionalTableSeeder::class);

        $this->call(PrestacionTableSeeder::class);

        $this->call(PrestacionRealizadaTableSeeder::class);
        $this->call(FichaAtencionSocialTableSeeder::class);
        $this->call(TipoMotivoSocialTableSeeder::class);
        $this->call(TipoAyudaTecnicoSocialTableSeeder::Class);
        $this->call(TipoSubmotivoSocialTableSeeder::class);
        $this->call(MotivoAtencionSocialTableSeeder::Class);

        $this->call(TutorTableSeeder::class);
        $this->call(RegistroSocialHogarTableSeeder::class);
        $this->call(CredencialDiscapacidadTableSeeder::class);
        $this->call(FichaBeneficiarioTableSeeder::class);
        $this->call(IsapreTableSeeder::class);
        $this->call(FonasaTableSeeder::class);
        $this->call(OrganizacionSocialTableSeeder::class);
        $this->call(SistemaProteccionTableSeeder::class);
        $this->call(BeneficioTableSeeder::class);
        $this->call(TipoDependenciaTableSeeder::class);
        $this->call(FichaDiscapacidadTableSeeder::class);
        $this->call(TipoDiscapacidadTableSeeder::class);
        $this->call(PrevisionTableSeeder::class);
        $this->call(DatoSocialTableSeeder::class);
        $this->call(DomicilioTableSeeder::class);


        $this->call(AntecedentesMorbidosTableSeeder::class);
        $this->call(ValAutocuidadoTableSeeder::class);
        $this->call(ValComCogTableSeeder::class);
        $this->call(ValControlEsfinterTableSeeder::class);
        $this->call(ValDeambulacionTableSeeder::class);
        $this->call(ValEvaluacionTableSeeder::class);
        $this->call(ValMotoraTableSeeder::class);
        $this->call(ValMovilidadTableSeeder::class);
        $this->call(ValSensorialTableSeeder::class);
        $this->call(ValSocialTableSeeder::class);
        $this->call(FichaKinesiologiaTableSeeder::class);


        $this->call(ActividadesVidaDiariaTableSeeder::class);
        $this->call(AntecedentesSocioFamiliaresTableSeeder::class);
        $this->call(AntecedentesSaludTableSeeder::class);
        $this->call(HistorialClinicoTableSeeder::class);
        $this->call(DesarrolloEvolutivoTableSeeder::class);
        $this->call(HabilidadesSocialesTableSeeder::class);
        $this->call(FichaTerapiaOcupacionalTableSeeder::class);





    }
}
