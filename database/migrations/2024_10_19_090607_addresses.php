<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id('address_id');
            $table->unsignedBigInteger('user_id');
            $table->string('address_label', 50);
            $table->string('receipt_name', 100);
            $table->string('phone_number', 20);
            $table->string('province', 100);
            $table->string('city_or_regency', 100);
            $table->string('district', 100);
            $table->string('postal_code', 20);
            $table->text('full_address');
            $table->text('address_note');
            $table->tinyInteger('is_main');
            $table->timestamps();

            // Defining the foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
