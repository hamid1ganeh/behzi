<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropDeletedAtColumnFromWorkItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_items', function (Blueprint $table) {
            if(Schema::hasColumn('work_items', 'deleted_at')) {
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
        Schema::table('work_items', function (Blueprint $table) {
            //
        });
    }
}
