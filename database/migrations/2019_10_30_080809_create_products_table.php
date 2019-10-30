<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('name_vi');
            $table->string('name_en');
			$table->string('desc_vi')->nullable();
            $table->string('desc_en')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price',11,2)->default(0);
            $table->text('content_vi')->nullable();
            $table->text('content_en')->nullable();
            $table->text('pictures')->nullable();
			$table->integer('review_num')->default(0);
            $table->decimal('rating', 2, 1)->default(0);
			$table->enum('status', ['Active','Inactive'])->default('Active');
			//$table->boolean('status')->default(true);
            $table->string('type',50)->nullable();
	
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
        Schema::dropIfExists('products');
    }
}
