<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageWorkTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_work_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->unsignedBigInteger('week_day_id')->nullable();
            $table->string('startTime',199)->nullable();
            $table->string('endTime',199)->nullable();
            $table->unsignedTinyInteger('status')->nullable();
            $table->timestamps();

            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('week_day_id')
                ->references('id')
                ->on('week_days')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_work_times');
    }
}
