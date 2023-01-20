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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->string('user_game_id');
            $table->foreignId('kode_id');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('metode')->nullable();
            $table->string('status');
            $table->decimal('tax', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('payment_status')->nullable();
            $table->string('payment_token')->nullable();
			$table->string('payment_url')->nullable();
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
        Schema::dropIfExists('order');
    }
};
