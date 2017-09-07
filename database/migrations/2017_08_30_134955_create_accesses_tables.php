<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('access_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            $table->unique('name');
        });

        Schema::create('access_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_type_id');
            $table->string('field')->nullable();
            $table->boolean('required')->default(false);
            $table->string('default')->nullable();
            $table->timestamps();

            $table->unique(['access_type_id','field']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_types');
        Schema::dropIfExists('access_fields');
    }
}
