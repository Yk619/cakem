<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->unsignedBigInteger('role_id')->default('1');
            $table->string('email')->nullable();
            $table->string('token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('password');
            $table->enum('status', ['0', '1', '2'])->default('0')->comment('0 for active, 1 for pending, 2 for block');
            $table->string('deviceToken')->nullable();
            $table->string('deviceType')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::table('users', function($table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
