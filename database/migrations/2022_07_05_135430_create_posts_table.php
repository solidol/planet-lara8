<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug',191)->unique();
            $table->mediumText('description')->nullable();
            $table->mediumText('alterpreview')->nullable();
            $table->longText('content');
            $table->string('postimg')->nullable();
            $table->dateTime('tg_date')->nullable();
            $table->integer('order_level')->default(1000);
            $table->string('post_type')->default('post');
            $table->string('lang')->default('all');
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('post_category_id')->default(1);
            $table->foreign('post_category_id')->references('id')->on('post_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
