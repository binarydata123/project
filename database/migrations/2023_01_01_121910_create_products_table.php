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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('product_id')->nullable();
            $table->string('price_id')->nullable();
            $table->timestamps();
        });

        Schema::table('schduled_meetings', function (Blueprint $table) {           
            $table->text('checkout_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');

        Schema::table('schduled_meetings', function (Blueprint $table) {
            $table->dropColumn('checkout_id');
        });
    }
};
