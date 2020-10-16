<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('cake_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('name_on_cake');
            $table->string('address');
            $table->integer('size');
            $table->timestamps();
        });

        Schema::table('orders', function($table) {
            $table->foreign('cake_id')->references('id')->on('cakes')->onDelete('cascade')->onUpdate('cascade');
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
