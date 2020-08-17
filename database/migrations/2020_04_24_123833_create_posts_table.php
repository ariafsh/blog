<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Sodium\increment;

class CreatePostsTable extends Migration
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
            $table->string('title',250);
            $table->string('subtitle',100);
            $table->string('slug',100);
            $table->boolean('status')->default(0);
            $table->text('body');
            $table->integer('posted_by')->nullable();
            $table->string('image')->nullable();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
