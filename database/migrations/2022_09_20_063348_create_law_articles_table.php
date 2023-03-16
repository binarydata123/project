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
        Schema::create('law_articles', function (Blueprint $table) {
            $table->id();            

            $table->unsignedBigInteger('added_by')->nullable();
			$table->foreign('added_by')
				->references('id')->on('users')   
                ->onDelete('cascade');  

            $table->string('title')->nullable();
            $table->longText('descr')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('law_articles');
    }
};
