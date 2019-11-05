<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('title_vi');
            $table->string('title_en');
			$table->string('desc_vi')->nullable();
            $table->string('desc_en')->nullable();
            $table->string('image')->nullable();
            $table->string('tags')->nullable();
            $table->text('content_vi')->nullable();
            $table->text('content_en')->nullable();

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
