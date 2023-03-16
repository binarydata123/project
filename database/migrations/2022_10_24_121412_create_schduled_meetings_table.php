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
        Schema::create('schduled_meetings', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('days_slot_id')->nullable();
			$table->foreign('days_slot_id')
				->references('id')->on('days_slots')   
                ->onDelete('cascade');

            $table->unsignedBigInteger('scheduled_by')->nullable();
			$table->foreign('scheduled_by')
				->references('id')->on('users')   
                ->onDelete('cascade');

            $table->unsignedBigInteger('lawyer_id')->nullable();
			$table->foreign('lawyer_id')
				->references('id')->on('users')   
                ->onDelete('cascade');            

            $table->string('payment_id')->nullable();
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
        Schema::dropIfExists('schduled_meetings');
    }
};
