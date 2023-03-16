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
        Schema::create('lawyer_recommended', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lawyer_service_id')->nullable();
			$table->foreign('lawyer_service_id')
				->references('id')->on('lawyer_services')
                ->onDelete('cascade');
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
        Schema::dropIfExists('lawyer_recommended');
    }
};
