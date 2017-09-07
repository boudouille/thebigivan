<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMysqlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mysql_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('site_id');
            $table->string('host');
            $table->string('username');
            $table->string('password')->nullable();
            $table->string('dbname');
            $table->timestamps();

            $table->unique(['site_id','name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mysql_accesses');
    }
}
