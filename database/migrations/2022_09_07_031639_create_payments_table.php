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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->nullable();

            $table->unsignedBigInteger('lawyer_service_id')->nullable();
			$table->foreign('lawyer_service_id')
				->references('id')->on('lawyer_services')   
                ->onDelete('cascade');
                
            $table->unsignedBigInteger('hired_by')->nullable();
			$table->foreign('hired_by')
				->references('id')->on('users')   
                ->onDelete('cascade');

            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
