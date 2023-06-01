<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectes', function (Blueprint $table) {
            $table->string('CodiProj', 6)->primary();
            $table->string('Nom');
            $table->date('DataInici');
            $table->date('DataFinalitzacio')->nullable();
            $table->enum('Classificacio', ['Tènica', 'Salut', 'Científica', 'Altres']);
            $table->integer('HoresAssignades');
            $table->float('PressupostAssignat');
            $table->integer('MaxInvestigadorsAssignables');
            $table->string('Responsable');
            $table->enum('Investigacio', ['Nacional', 'Europea', 'Internacional']);
            $table->string('IdiomaTreball');
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
        Schema::dropIfExists('projectes');
    }
}
