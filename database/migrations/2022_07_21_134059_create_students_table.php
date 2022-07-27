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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->unsignedBigInteger('student_id');
            $table->string('first_name');
            $table->string('last_name');

            $table->string('phone');
            $table->string('address');
            $table->string('scientific_degree')->nullable(true);
            $table->date('birth_date')->nullable(true);

            $table->unsignedBigInteger('account_id')->unique();
            $table->unsignedBigInteger('parent_id')->unique();
            $table->foreign('account_id')->references('id')->on('users');
            $table->foreign('parent_id')->references('id')->on('parents');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
