<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_currency', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_symbol');
            $table->integer('base');
            $table->integer('conversion_rate');
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
        Schema::drop('base_currency');
    }
}
