<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verifyCode',10)->nullable();
            $table->timestamp('codeExpireTime')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedTinyInteger('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            //references
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
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
        Schema::table('users', function (Blueprint $table) {
            if(Schema::hasColumn('cities', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });

        Schema::dropIfExists('users');
    }
}
