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

            $table->string('phone');
            $table->string('address');
            $table->string('scientific_degree')->nullable(true);
            $table->date('birth_date')->nullable(true);

            $table->unsignedBigInteger('account_id')->unique();

            $table->foreign('account_id')->references('id')->on('users') ->onUpdate('cascade')
                ->onDelete('cascade');;

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
