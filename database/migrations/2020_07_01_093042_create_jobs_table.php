<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_location');
            $table->string('company_name');
            $table->string('apply_url')->nullable();
            $table->string('apply_email')->nullable();
            $table->text('job_description');
            $table->text('job_responspilty')->nullable();
            $table->text('job_requirements')->nullable();
            $table->string('job_color')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->SoftDeletes();
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
        Schema::dropIfExists('jobs');
    }
}
