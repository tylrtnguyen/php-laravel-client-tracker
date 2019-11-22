<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->bigInteger('notification_id')->unsigned();
            $table->foreign('notification_id')->references('id')->on('notifications');
            $table->date('start_date');
            $table->string('frequency');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_events');
    }
}
