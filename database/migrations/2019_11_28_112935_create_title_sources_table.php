<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('typeid')->index();
            $table->integer('dutyadmin')->index();
            $table->string('write')->index();
            $table->integer('used')->default(0)->index();
            $table->string('title')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('title_sources');
    }
}
