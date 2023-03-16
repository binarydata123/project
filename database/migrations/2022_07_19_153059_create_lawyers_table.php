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
        Schema::create('lawyers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
			$table->foreign('user_id')
				->references('id')->on('users')
                ->onDelete('cascade');
                
            $table->string('profile_pic')->nullable();
            $table->string('law_firm_name')->nullable();
            $table->string('law_firm_website')->nullable();
            $table->string('emirates')->nullable();
            $table->string('office_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('landline_number')->nullable();
            $table->string('position')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('language')->nullable();
            $table->string('moj_reg_no')->nullable();            
            $table->string('calendly_link')->nullable();            

            $table->unsignedBigInteger('arbitration_area_id')->nullable();
			$table->foreign('arbitration_area_id')
				->references('id')->on('arbitration_areas')
                ->onDelete('cascade');

            $table->longText('summary')->nullable();
            $table->string('education')->nullable();
            $table->string('honors_and_awards')->nullable();
            $table->string('assosiation_and_membership')->nullable();
            $table->longText('disclaimer')->nullable();
            $table->timestamp('last_active_at')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('lawyers');
    }
};
