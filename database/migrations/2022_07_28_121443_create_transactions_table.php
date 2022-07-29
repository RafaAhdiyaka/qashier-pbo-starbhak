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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('no_meja');
            $table->foreignId('menu_id');
            $table->integer('qty');
            $table->bigInteger('subtotal');
            $table->enum('pembayaran', ['tunai', 'credit card', 'dana', 'ovo', 'gopay']);
            $table->foreignId('user_id');
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
        Schema::dropIfExists('transactions');
    }
};
