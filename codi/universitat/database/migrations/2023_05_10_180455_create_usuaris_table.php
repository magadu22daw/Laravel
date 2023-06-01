<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuaris', function (Blueprint $table) {
            $table->id();
            $table->string('nom_cognoms');
            $table->string('email')->unique();
            $table->string('contrasenya');
            $table->enum('tipus', ['gestor', 'director'])->nullable();
            $table->timestamp('darrera_hora_entrada')->nullable();
            $table->timestamp('darrera_hora_sortida')->nullable();
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
        Schema::dropIfExists('usuaris');
    }
}
