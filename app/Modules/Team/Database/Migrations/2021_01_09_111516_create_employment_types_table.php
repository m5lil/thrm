<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_types', function (Blueprint $table) {
            $table->id();

            $table->text('name');

            $table->timestamps();
        });


        // Create table employment_types to leaves (Many-to-Many)
        Schema::create('employment_type_leave', function (Blueprint $table) {
            // see https://laravel.com/docs/8.x/migrations#foreign-key-constraints
            $table->foreignId('employment_type_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('leave_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->tinyInteger('custom_total_days')->nullable();

            $table->primary(['employment_type_id', 'leave_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employment_types');
        Schema::dropIfExists('employment_type_leave');
    }
}
