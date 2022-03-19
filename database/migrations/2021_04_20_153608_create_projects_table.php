<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->double('grade')->nullable();


            //cover image
            $table->string('cover')->nullable();
            //path of the file
            $table->string('path')->nullable();
            //presentation
            $table->string('ppt')->nullable();
            //code files
            $table->string('code')->nullable();
            //github url
            $table->string('github')->nullable();
            //host url
            $table->string('host')->nullable();


            $table->bigInteger('project_form_id')->nullable();
            $table->foreign('project_form_id')
            ->references('id')
            ->on('project_forms')->onDelete('cascade');

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
        Schema::dropIfExists('projects');
    }
}
