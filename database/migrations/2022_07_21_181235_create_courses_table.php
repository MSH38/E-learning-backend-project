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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->decimal('fess');
            $table->string('description');
            $table->double('totalHours')->nullable(true);
            $table->integer('videosCount')->nullable(true);
            $table->string('image')->nullable(true);
            $table->foreignId('instructor_id')->constrained('instructors');
            $table->unsignedBigInteger('accepted-by');
            $table->foreign('accepted-by')->references('id')->on('admins');
            $table->foreignId('sub_category_id')->constrained('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
