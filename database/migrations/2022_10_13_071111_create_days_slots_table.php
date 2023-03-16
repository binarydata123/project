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
        Schema::create('days_slots', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('slot_id')->nullable();
			$table->foreign('slot_id')
				->references('id')->on('slots')   
                ->onDelete('cascade');

            $table->string('day')->nullable();
            $table->string('slot_start_time')->nullable();
            $table->string('slot_end_time')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('days_slots');
    }
};
