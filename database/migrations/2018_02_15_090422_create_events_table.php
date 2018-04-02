<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('date');
            $table->string('venue');
            $table->string('rule1');
            $table->string('rule2');
            $table->string('rule3');
            $table->string('rule4');
            $table->string('rule5');
            $table->string('rule6');
            $table->string('rule7');
            $table->string('rule8');
            $table->string('rule9');
            $table->string('rule10');
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
        Schema::dropIfExists('events');
    }
}
