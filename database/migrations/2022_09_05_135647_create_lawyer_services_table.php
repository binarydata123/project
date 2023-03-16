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
        Schema::create('lawyer_services', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('service_id')->nullable();
			$table->foreign('service_id')
				->references('id')->on('services')
                ->onDelete('cascade');
            $table->unsignedBigInteger('lawyer_id')->nullable();
			$table->foreign('lawyer_id')
				->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('lawyer_fee')->nullable();
            $table->string('platform_fee')->nullable();
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
        Schema::dropIfExists('lawyer_services');
    }
};
