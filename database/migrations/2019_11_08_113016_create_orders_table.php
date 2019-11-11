<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('street_address')->nullable();
            $table->string('other_address')->nullable();
            $table->string('state_city')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode_zip')->nullable();
            $table->string('phone')->nullable();
            $table->integer('coupon_id')->nullable();
            $table->decimal('amount', 11, 2)->default(0);
            $table->decimal('tax_amount', 11, 2)->default(0);
            $table->boolean('flat_rate')->default(false);
            $table->decimal('ship_amount', 11, 2)->default(0);
            $table->decimal('discount_amount', 11, 2)->default(0);
            $table->decimal('total_amount', 11, 2)->default(0);
            $table->decimal('billing_amount', 11, 2)->default(0);
            $table->integer('total_item')->nullable();
            $table->string('currency',10)->nullable();
            $table->enum('status', ['Requested','Approved','Unpaid','Paid','Shipping','Done','Canceled'])->default('Requested');
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
        Schema::dropIfExists('orders');
    }
}
