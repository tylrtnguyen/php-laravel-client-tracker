<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNotificationIdConstraintsOfClientEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('client_events', function (Blueprint $table) {
            $table->dropForeign('client_events_notification_id_foreign');
            $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
