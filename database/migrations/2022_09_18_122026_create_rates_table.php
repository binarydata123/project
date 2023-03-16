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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('answer_id')->nullable();
			$table->foreign('answer_id')
				->references('id')->on('forum_answers')   
                ->onDelete('cascade');   
                        
            $table->unsignedBigInteger('rated_by')->nullable();
			$table->foreign('rated_by')
				->references('id')->on('users')   
                ->onDelete('cascade');   
            
            $table->integer('rate')->nullable();
            $table->longText('comment')->nullable();
            $table->boolean('is_verified')->default(0);
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
        Schema::dropIfExists('rates');
    }
};
