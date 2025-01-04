<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('prenom')->nullable();
                $table->boolean('isAdmin')->default(false);
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->date('dateNaissance')->nullable();
                $table->string('telephone')->nullable();
                $table->string('annexe')->nullable();
                // $table->string('rendmenet_id_A1')->nullable();
                // $table->string('rendmenet_id_A2')->nullable();
                // $table->string('rendmenet_id_A3')->nullable();
                $table->unsignedBigInteger('affectation_id')->nullable();
                $table->foreign('affectation_id')->references('id')->on('affectation')->onDelete('set null');

                
                $table->rememberToken();
                $table->timestamps();
            });
        }
        
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
