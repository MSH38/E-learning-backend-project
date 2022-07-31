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
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('student_id')->constrained('students');
>>>>>>> cd8630b85284da0471c1cf56f2fb1831633a3d56
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
