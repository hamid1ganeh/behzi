<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_id');
            $table->string('title',191)->nullable();
            $table->text('aboutUs')->nullable();
            $table->text('privacyPolicy')->nullable();
            $table->unsignedTinyInteger('status')->nullable();
            $table->timestamps();

            //references
            $table->foreign('domain_id')
                ->references('id')
                ->on('domains')
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
        Schema::dropIfExists('domain_detail');
    }
}
