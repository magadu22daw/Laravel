<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigadors', function (Blueprint $table) {
            $table->string('Passaport', 255)->primary();
            $table->string('CodiAsseguranca');
            $table->string('NomCognoms');
            $table->string('Especialitat');
            $table->string('Telefon');
            $table->string('Adreca');
            $table->string('Ciutat');
            $table->string('Pais');
            $table->string('Email')->unique();
            $table->enum('Titulacio', ['Doctor', 'Master', 'Grau', 'Estudiant', 'Altres']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigadors');
    }
}
