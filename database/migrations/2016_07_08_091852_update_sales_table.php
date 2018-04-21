<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales',function($table)
        {
            $table->string('pvt_contact_info')->after('contact_info');
            $table->text('pvt_address')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function($table){

            $table->dropcolumn(['pvt_contact_info','pvt_address']);
        });
    }
}
