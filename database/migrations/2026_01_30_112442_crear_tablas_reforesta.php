<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nick',20)->unique();
            $table->string('nombre',20);
            $table->string('apellidos',50)->nullable();
            $table->string('password',64);
            $table->string('email',50)->unique();
            $table->integer('karma')->default(0);
            $table->string('avatar',300)->nullable();
        });

        Schema::create('usuarios_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('lugar',20);
            $table->string('nombre',20);
            $table->date('fecha',50)->default(Carbon::now());
            $table->string('descripcion',300)->nullable();
            $table->string('tipo_terreno',50)->nullable();
            $table->integer('tipo_evento')->nullable();
            $table->string('imagen',300)->nullable();
            $table->foreignId('id_anfitrion')->nullable()->constrained('usuarios');
            
        });





        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('lugar',20);
            $table->string('nombre',20);
            $table->date('fecha',50)->default(Carbon::now());
            $table->string('descripcion',300)->nullable();
            $table->string('tipo_terreno',50)->nullable();
            $table->integer('tipo_evento')->nullable();
            $table->string('imagen',300)->nullable();
            $table->foreignId('id_anfitrion')->nullable()->constrained('usuarios');
            
        });

        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('nick',20)->unique();
            $table->string('nombre',20);
            $table->string('apellidos',50)->nullable();
            $table->string('password',64);
            $table->string('email',50)->unique();
            $table->integer('karma')->default(0);
            $table->string('avatar',150)->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('especies');
        Schema::dropIfExists('eventos');
    }
};
