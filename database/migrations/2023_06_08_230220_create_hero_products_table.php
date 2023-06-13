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
        Schema::create('hero_product', function (Blueprint $table) {
            $table->id();
            $table->string('hero_id')->unique();
            $table->string('name');
            $table->string('path');
            $table->string('image')->nullable();
            $table->string('category');
            $table->string('description');
            $table->string('status');
            $table->bigInteger('sold');
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
        Schema::dropIfExists('hero_product');
    }
};
