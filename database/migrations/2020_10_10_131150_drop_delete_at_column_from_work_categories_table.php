<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropDeleteAtColumnFromWorkCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_categories', function (Blueprint $table) {
            if(Schema::hasColumn('work_categories', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_categories', function (Blueprint $table) {
            //
        });
    }
}
