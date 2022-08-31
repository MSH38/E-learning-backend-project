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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();


            $table->string('phone')->nullable(true);
            $table->text('address')->nullable(true);
            $table->text('description')->nullable(true);
            $table->date('birth_date')->nullable(true);

            $table->string('scientific_degree')->nullable(true);
            $table->unsignedBigInteger('account_id')->unique();
            $table->foreign('account_id')->references('id')->on('users') ->onUpdate('cascade')
                ->onDelete('cascade');;
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
        Schema::dropIfExists('instructors');
    }
};
