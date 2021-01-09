<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Teams extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('name');

            $table->timestamps();
        });

        // Create table Teams to users (Many-to-Many)
        Schema::create('team_user', function (Blueprint $table) {
            // see https://laravel.com/docs/8.x/migrations#foreign-key-constraints
            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('team_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['user_id', 'team_id']);
        });

    }



    public function down()
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('team_user');
    }
}
