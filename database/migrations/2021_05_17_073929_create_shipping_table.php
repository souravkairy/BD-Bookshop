<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('shipping_name');
            $table->string('division');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_p_code');
            $table->string('shipping_email');
            $table->string('shipping_m_num');
            $table->string('shipping_m_num2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping');
    }
}
