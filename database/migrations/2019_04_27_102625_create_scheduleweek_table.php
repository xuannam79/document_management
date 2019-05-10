<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleweekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduleweek', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->text('content')->nullable();
            $table->text('note')->nullable();
            $table->integer('user_id');
            $table->integer('is_active');
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
        Schema::dropIfExists('scheduleweek');
    }
}
