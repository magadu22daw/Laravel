<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participa', function (Blueprint $table) {
            $table->string('Passaport');
            $table->string('CodiProj');
            $table->date('DataInici');
            $table->date('DataFinal')->nullable();
            $table->float('Retribucio');
            $table->enum('ParticipacioProrrogable', ['Sí', 'No']);
            $table->enum('ParticipacioPublicacio', ['Sí', 'No']);

            // Definir las columnas como claves primarias
            $table->primary(['Passaport', 'CodiProj']);

            $table->timestamps();
        });

        // Definir las claves foráneas
        Schema::table('participa', function (Blueprint $table) {
            $table->foreign('Passaport')->references('Passaport')->on('investigadors')->onDelete('cascade');
            $table->foreign('CodiProj')->references('CodiProj')->on('projectes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Eliminar las claves foráneas
        Schema::table('participa', function (Blueprint $table) {
            $table->dropForeign(['Passaport']);
            $table->dropForeign(['CodiProj']);
        });

        Schema::dropIfExists('participa');
    }
}