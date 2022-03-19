<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Firstname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();


            $table->string('Lastname')->nullable();
            $table->year('RegYeer')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Address')->nullable();
            $table->integer('mobileNo')->nullable();
            $table->string('status')->default('pending');

            $table->string('img_path')->nullable();
            $table->text('About')->nullable();
            $table->string('github')->default('https://www.github.com')->nullable();
            $table->string('linkedin')->default('https://www.linkedin.com')->nullable();


            //collegue
            $table->bigInteger('collegue_id')->nullable();
            $table->foreign('collegue_id')
            ->references('id')
            ->on('collegues')->onDelete('cascade');

            //ProfessorRole
            $table->bigInteger('professor_roles_id')->nullable();
            $table->foreign('professor_roles_id')
            ->references('id')
            ->on('professor_roles')->onDelete('cascade');

            //uok id
            $table->bigInteger('uok_id')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
