<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Leaves extends Migration
{
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('name');
            $table->tinyInteger('total_days');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('');
    }
}
