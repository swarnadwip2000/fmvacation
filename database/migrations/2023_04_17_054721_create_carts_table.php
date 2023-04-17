<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->string('session_id')->nullable();
            $table->foreignId('package_id')->references('id')->on('packages')->onDelete('cascade')->nullable();
            $table->string('send_to')->nullable();
            $table->string('send_from')->nullable();
            $table->string('send_message')->nullable();
            $table->string('delivery_method')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
