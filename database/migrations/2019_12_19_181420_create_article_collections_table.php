<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->index();
            $table->integer('isused')->default(0)->index();
            $table->string('brandname')->nullable()->index();
            $table->string('url')->nullable()->index();
            $table->text('body')->nullable();
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
        Schema::dropIfExists('article_collections');
    }
}
