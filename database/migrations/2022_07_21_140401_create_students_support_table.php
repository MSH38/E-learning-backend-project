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
        Schema::create('students_support', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('support');
<<<<<<< HEAD
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('student_id')->constrained('students');
=======
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('student_id')->references('id')->on('students');
>>>>>>> c2b11524b044e53381743c08e3e27edda7c083ef
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_support');
    }
};
