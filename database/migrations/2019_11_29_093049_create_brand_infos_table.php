<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brandname')->index();
            $table->text('brandinfo');
            $table->string('type')->index();
            $table->string('retype')->index();
            $table->string('referer')->index();
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
        Schema::dropIfExists('brand_infos');
    }
}
