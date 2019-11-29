<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('typeid')->index();
            $table->integer('content_type')->index();
            $table->integer('dutyadmin')->index();
            $table->string('write')->index();
            $table->integer('used')->default(0)->index();
            $table->text('content');
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
        Schema::dropIfExists('content_sources');
    }
}
