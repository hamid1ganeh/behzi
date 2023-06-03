<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTimestampsColumnFromWorkItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_items', function (Blueprint $table) {
            if(Schema::hasColumn('work_items', 'created_at')) {
                $table->dropColumn('created_at');
            }

            if(Schema::hasColumn('work_items', 'updated_at')) {
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
        Schema::table('work_items', function (Blueprint $table) {
            //
        });
    }
}
