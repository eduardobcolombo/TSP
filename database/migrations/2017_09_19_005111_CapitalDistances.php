<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CapitalDistances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capital_distances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('capital_id')->unsigned();
            $table->foreign('capital_id')->references('id')->on('capital');
            $table->integer('capital_id_until')->unsigned();
            $table->foreign('capital_id_until')->references('id')->on('capital');
            $table->float('distance', 10, 2);
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
        Schema::dropIfExists('capital_distances');
    }
}
