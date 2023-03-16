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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id')->nullable();
			$table->foreign('group_id')
				->references('id')->on('groups')   
                ->onDelete('cascade');
        });

        Schema::table('law_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
			$table->foreign('category_id')
				->references('id')->on('law_categories')   
                ->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('group_id');
            $table->dropColumn('group_id');
        });

        Schema::table('law_articles', function (Blueprint $table) {
            $table->dropForeign('category_id');
            $table->dropColumn('category_id');
        });
    }
};
