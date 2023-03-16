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
        Schema::create('chat_notifications', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('to_user')->nullable();
			$table->foreign('to_user')
				->references('id')->on('users')   
                ->onDelete('cascade');

            $table->unsignedBigInteger('from_user')->nullable();
            $table->foreign('from_user')
                ->references('id')->on('users')   
                ->onDelete('cascade');

            $table->boolean('is_group')->default(0);
            
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')
                ->references('id')->on('groups')   
                ->onDelete('cascade');

            $table->boolean('seen')->default(0);
            $table->text('msg')->nullable();
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
        Schema::dropIfExists('chat_notifications');
    }
};
