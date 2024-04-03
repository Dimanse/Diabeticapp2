<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidos');
            $table->string('direccion')->nullable();
            $table->string('doctor')->nullable();
            $table->string('hospital')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('imagen')->nullable();
            $table->date('fecha');
            $table->integer('estatura');
            $table->integer('peso');
            $table->string('tipos');
            $table->string('inyecta');
            $table->string('tipo')->nullable();
            $table->string('insulina')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('insulina2')->nullable();
            $table->string('cantidad2')->nullable();
            $table->string('metformina');
            $table->string('dosis')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
