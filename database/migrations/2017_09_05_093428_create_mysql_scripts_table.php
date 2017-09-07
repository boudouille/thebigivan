<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMysqlScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mysql_scripts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mysql_access_id');
            $table->string('name');
            $table->text('script');
            $table->timestamps();

            $table->unique(['mysql_access_id','name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mysql_scripts');
    }
}
