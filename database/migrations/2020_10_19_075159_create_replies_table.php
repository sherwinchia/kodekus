<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('comment_id');
          $table->unsignedBigInteger('user_id')->nullable();
          $table->string('name')->nullable();
          $table->string('email')->nullable();
          $table->text('content');
          $table->boolean('approved')->default(0);
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
        Schema::dropIfExists('replies');
    }
}
