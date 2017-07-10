<?php

namespace Tests\Browser;

use App\Beneficiario;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegistrarBeneficiarioTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $beneficiario = factory(Beneficiario::class)->create/*make dont save*/([
            'nombre' => 'juan'
        ]);
        $this->browse(function (Browser $browser) use ($beneficiario) {
            $browser->visit('/beneficiario/registrar/')
                    ->assertSee('Registro de Usuario')
                    ->type('nombres', $beneficiario->nombre)
                    ->press('Continuar')
                    ->press('Continuar')
                    ->press('Finalizar')
                    ->assertPathIs('//beneficiario/registrar/');
        });
    }
}
