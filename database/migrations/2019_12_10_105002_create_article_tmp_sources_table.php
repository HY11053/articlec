<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTmpSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tmp_sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->index()->nullable();
            $table->string('retype')->index()->nullable();
            $table->text('brandinfo')->nullable();
            $table->text('youshi')->nullable();
            $table->text('liucheng')->nullable();
            $table->text('tiaojian')->nullable();
            $table->text('tese')->nullable();
            $table->text('liyou')->nullable();
            $table->text('zhichi')->nullable();
            $table->string('referer')->index();
            $table->string('brandname')->index();
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
        Schema::dropIfExists('article_tmp_sources');
    }
}
