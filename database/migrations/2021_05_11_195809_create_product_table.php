<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('p_name');
            $table->integer('category_id');
            $table->integer('sub_cat_id');
            $table->integer('brand_id');
            $table->text('color');
            $table->string('size')->nullable();
            $table->string('qty');
            $table->text('unit');
            $table->string('subject');
            $table->string('s_price')->nullable();
            $table->string('c_price')->nullable();
            $table->string('discount_type');
            $table->integer('discount');
            $table->text('p_desc')->nullable();
            $table->string('topSelling')->nullable();
            $table->string('hot')->nullable();
            $table->string('new')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('Time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
