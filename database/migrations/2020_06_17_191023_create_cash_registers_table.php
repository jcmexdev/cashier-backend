<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('opening_date');
            $table->time('opening_hour');
            $table->integer('previous_closing_value');
            $table->integer('opening_value');
            $table->mediumText('description')->nullable()->default(null);
            $table->date('closing_date')->nullable()->default(null);
            $table->time('closing_hour')->nullable()->default(null);
            $table->integer('card_value')->nullable()->default(null);
            $table->integer('cash_value')->nullable()->default(null);
            $table->integer('closing_value')->nullable()->default(null);
            $table->integer('sales_value')->nullable()->default(null);
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
        Schema::dropIfExists('cash_registers');
    }
}
