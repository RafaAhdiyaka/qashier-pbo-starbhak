<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('nama_resto');
            $table->string('alamat_resto');
            $table->bigInteger('nomor_telepon');
            $table->string('email_resto');
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
        Schema::dropIfExists('profile_restaurants');
    }
};
