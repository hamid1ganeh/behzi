<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_category_id');
            $table->unsignedBigInteger('review_group_id');
            $table->string('name')->nullable();
            $table->unsignedTinyInteger('status')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('work_category_id')
                ->references('id')
                ->on('work_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('review_group_id')
                ->references('id')
                ->on('review_groups')
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
        Schema::table('work_items', function(Blueprint $table){
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('work_items');
    }
}
