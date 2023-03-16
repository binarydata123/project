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
        Schema::create('slot_fees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lawyer_id')->nullable();
			$table->foreign('lawyer_id')
				->references('id')->on('users')   
                ->onDelete('cascade');

            $table->string('fifteen')->nullable();
            $table->string('thirty')->nullable();
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
        Schema::dropIfExists('slot_fees');
    }
};
