<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_forms', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');
            $table->bigInteger('category_id');
            $table->bigInteger('professorSupervisor');
            $table->string('laboratorySupervisor')->nullable();
            //student id
            $table->bigInteger('student');
            $table->string('studentPartner')->nullable();
            $table->text('skills');
            $table->text('goal');
            $table->text('about');

            $table->string('status')->default('pending');
            $table->string('reject_message')->nullable();

            //reject_message
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('location')->nullable();

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
        Schema::dropIfExists('project_forms');
    }
}
