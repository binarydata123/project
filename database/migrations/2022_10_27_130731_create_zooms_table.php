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
        Schema::create('zooms', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();

            $table->unsignedBigInteger('days_slot_id')->nullable();
			$table->foreign('days_slot_id')
				->references('id')->on('days_slots')   
                ->onDelete('cascade');

            $table->unsignedBigInteger('payment_id')->nullable();
			$table->foreign('payment_id')
				->references('id')->on('schduled_meetings')   
                ->onDelete('cascade');

            $table->string('topic')->nullable();
            $table->string('start_date_time')->nullable();
            $table->string('end_date_time')->nullable();
            $table->integer('duration')->nullable();
            $table->string('agenda')->nullable();
            $table->longText('start_url')->nullable();
            $table->string('join_url')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('zooms');
    }
};
