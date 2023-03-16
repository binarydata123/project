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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lawyer_id')->nullable();
			$table->foreign('lawyer_id')
				->references('id')->on('users')   
                ->onDelete('cascade');

            $table->boolean('monday_slot')->default(0);
            $table->boolean('tuesday_slot')->default(0);
            $table->boolean('wednesday_slot')->default(0);
            $table->boolean('thursday_slot')->default(0);
            $table->boolean('friday_slot')->default(0);
            $table->boolean('saturday_slot')->default(0);
            $table->boolean('sunday_slot')->default(0);
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('slots');
    }
};
