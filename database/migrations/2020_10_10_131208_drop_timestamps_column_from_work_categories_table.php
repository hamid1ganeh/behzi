<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTimestampsColumnFromWorkCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_categories', function (Blueprint $table) {
            if(Schema::hasColumn('work_categories', 'created_at')) {
                $table->dropColumn('created_at');
            }

            if(Schema::hasColumn('work_categories', 'updated_at')) {
                $table->dropColumn('updated_at');
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
