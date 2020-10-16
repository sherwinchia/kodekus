<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->text('description');
            $table->longText('image')->nullable();
            $table->string('slug')->unique();

            $table->string('title');
            $table->longText('body');
            $table->unsignedBigInteger('category_id');
            $table->integer('read_minutes')->nullable();
            $table->string('publish_date')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();

            $table->boolean('featured')->default(0);
            $table->boolean('approved')->default(0);
            $table->boolean('trending')->default(0);
            $table->boolean('published')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
