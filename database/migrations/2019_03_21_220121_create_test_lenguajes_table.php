<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestLenguajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_lenguajes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('p1',2)->nullable();
            $table->string('p1_grande',2)->nullable();
            $table->string('p1_chico',2)->nullable();
            $table->string('p2',2)->nullable();
            $table->string('p2_menos',2)->nullable();
            $table->string('p2_mas',2)->nullable();
            $table->string('p3',2)->nullable();
            $table->string('p3_gato',2)->nullable();
            $table->string('p3_perro',2)->nullable();
            $table->string('p3_chancho',2)->nullable();
            $table->string('p3_pato',2)->nullable();
            $table->string('p3_paloma',2)->nullable();
            $table->string('p3_oveja',2)->nullable();
            $table->string('p3_tortuga',2)->nullable();
            $table->string('p3_gallina',2)->nullable();
            $table->string('p4',2)->nullable();
            $table->string('p4_paraguas',2)->nullable();
            $table->string('p4_vela',2)->nullable();
            $table->string('p4_escoba',2)->nullable();
            $table->string('p4_tetera',2)->nullable();
            $table->string('p4_zapatos',2)->nullable();
            $table->string('p4_reloj',2)->nullable();
            $table->string('p4_serrucho',2)->nullable();
            $table->string('p4_taza',2)->nullable();
            $table->string('p5',2)->nullable();
            $table->string('p5_largo',2)->nullable();
            $table->string('p5_corto',2)->nullable();
            $table->string('p6',2)->nullable();
            $table->string('p6_cortando',2)->nullable();
            $table->string('p6_saltando',2)->nullable();
            $table->string('p6_planchando',2)->nullable();
            $table->string('p6_comiendo',2)->nullable();
            $table->string('p7',2)->nullable();
            $table->string('p7_cuchara',2)->nullable();
            $table->string('p7_lapiz',2)->nullable();
            $table->string('p7_jabon',2)->nullable();
            $table->string('p7_escoba',2)->nullable();
            $table->string('p7_cama',2)->nullable();
            $table->string('p7_tijera',2)->nullable();
            $table->string('p8',2)->nullable();
            $table->string('p8_pesado',2)->nullable();
            $table->string('p8_liviano',2)->nullable();
            $table->string('p9',2)->nullable();
            $table->string('p9_nombre',2)->nullable();
            $table->string('p9_apellido',2)->nullable();
            $table->string('p10',2)->nullable();
            $table->string('p11',2)->nullable();
            $table->string('p11_papa',2)->nullable();
            $table->string('p11_mama',2)->nullable();
            $table->string('p12',2)->nullable();
            $table->string('p12_hambre',2)->nullable();
            $table->string('p12_cansado',2)->nullable();
            $table->string('p12_frio',2)->nullable();
            $table->string('p13',2)->nullable();
            $table->string('p13_detras',2)->nullable();
            $table->string('p13_sobre',2)->nullable();
            $table->string('p13_bajo',2)->nullable();
            $table->string('p14',2)->nullable();
            $table->string('p14_hielo',2)->nullable();
            $table->string('p14_raton',2)->nullable();
            $table->string('p14_mama',2)->nullable();
            $table->string('p15',2)->nullable();
            $table->string('p15_azul',2)->nullable();
            $table->string('p15_amarillo',2)->nullable();
            $table->string('p15_rojo',2)->nullable();
            $table->string('p16',2)->nullable();
            $table->string('p16_azul',2)->nullable();
            $table->string('p16_amarillo',2)->nullable();
            $table->string('p16_rojo',2)->nullable();
            $table->string('p17',2)->nullable();
            $table->string('p17_circulo',2)->nullable();
            $table->string('p17_cuadrado',2)->nullable();
            $table->string('p17_tringulo',2)->nullable();
            $table->string('p18',2)->nullable();
            $table->string('p18_circulo',2)->nullable();
            $table->string('p18_cuadrado',2)->nullable();
            $table->string('p18_triangulo',2)->nullable();
            $table->string('p19',2)->nullable();
            $table->string('p19_13',2)->nullable();
            $table->string('p19_14',2)->nullable();
            $table->string('p20',2)->nullable();
            $table->string('p21',2)->nullable();
            $table->string('p22',2)->nullable();
            $table->string('p22_antes',2)->nullable();
            $table->string('p22_despues',2)->nullable();
            $table->string('p23',2)->nullable();
            $table->string('p23_manzana',2)->nullable();
            $table->string('p23_pelota',2)->nullable();
            $table->string('p23_zapato',2)->nullable();
            $table->string('p23_abrigo',2)->nullable();
            $table->string('p24',2)->nullable();
            $table->string('p24_pelota',2)->nullable();
            $table->string('p24_globo',2)->nullable();
            $table->string('p24_bolsa',2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_lenguajes');

    }
}
