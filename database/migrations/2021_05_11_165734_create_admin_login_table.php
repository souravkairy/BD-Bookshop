<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_login', function (Blueprint $table) {

            $table->increments('id');
            $table->string('user_name');
            $table->string('email');
            $table->string('password');
            $table->tinyInteger('dashboard')->default(0)->nullable();
            $table->tinyInteger('product_section')->default(0)->nullable();
            $table->tinyInteger('job_section')->default(0)->nullable();
            $table->tinyInteger('order_section')->default(0)->nullable();
            $table->tinyInteger('site_setting')->default(0)->nullable();
            $table->tinyInteger('contact_section')->default(0)->nullable();
            $table->tinyInteger('blog_section')->default(0)->nullable();
            $table->tinyInteger('stock_section')->default(0)->nullable();
            $table->tinyInteger('status');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_login');
    }
}
