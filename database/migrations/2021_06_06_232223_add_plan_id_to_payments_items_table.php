<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlanIdToPaymentsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments_items', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_id')
                ->index('payments_items_plan_id_foreign')
                ->after('course_id')
                ->nullable();

            $table->foreign('plan_id')
                ->references('id')
                ->on('plans')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments_items', function (Blueprint $table) {
            $table->dropForeign('payments_items_plan_id_foreign');
            $table->dropColumn('plan_id');
        });
    }
}
