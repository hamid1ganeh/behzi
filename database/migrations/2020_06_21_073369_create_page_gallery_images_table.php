<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_gallery_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_gallery_id');
            $table->unsignedBigInteger('priority')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('page_gallery_id')
                ->references('id')
                ->on('page_galleries')
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
        Schema::dropIfExists('page_gallery_images');
        Schema::table('page_gallery_images', function(Blueprint $table){
           $table->dropSoftDeletes();
        });
    }
}
