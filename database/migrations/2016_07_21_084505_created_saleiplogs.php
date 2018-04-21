<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedSaleiplogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
       Schema::create('saleiplogs', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('client_id');
           $table->string('ip');
           $table->integer('sale_id')->unsigned();
           $table->integer('visited');
           $table->foreign('sale_id')->references('id')->on('sales');
           $table->timestamps();
       });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
       Schema::drop('saleiplogs');
   }
}
