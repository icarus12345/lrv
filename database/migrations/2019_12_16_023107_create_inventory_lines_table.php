<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_lines', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('inventory_header_id');
            $table->integer('product_id');
            $table->string('product_name')->nullable();
            $table->string('line_memo')->nullable();
            $table->integer('qty')->default(0);

            $table->integer('warehouse_id');
            $table->decimal('price',11,2)->default(0);
            $table->decimal('amount',11,2)->default(0);


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
        Schema::dropIfExists('inventory_lines');
    }
}
