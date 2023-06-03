<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_item_id');
            $table->string('code')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('level')->nullable();
            $table->unsignedTinyInteger('status')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->unsignedBigInteger('rate')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('work_item_id')
                ->references('id')
                ->on('work_items')
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
        Schema::table('pages', function(Blueprint $table){
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('pages');
    }
}
