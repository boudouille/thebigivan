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
        Schema::create('accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id');
            $table->integer('access_type_id');
            $table->timestamps();
        });

        Schema::create('access_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            $table->unique('name');
        });

        Schema::create('access_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_type_id');
            $table->string('field');
            $table->timestamps();

            $table->unique(['access_type_id','field']);
        });

        Schema::create('access_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_id');
            $table->integer('access_field_id');
            $table->string('value');
            $table->timestamps();

            $table->unique(['access_id','access_field_id']);
        });

        Schema::create('collaborator_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('collaborator_id');
            $table->integer('access_id');
            $table->boolean('authorization')->default(false);
            $table->timestamps();

            $table->unique(['access_id','collaborator_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesses');
        Schema::dropIfExists('access_types');
        Schema::dropIfExists('access_fields');
        Schema::dropIfExists('access_values');
        Schema::dropIfExists('collaborator_accesses');
    }
}
