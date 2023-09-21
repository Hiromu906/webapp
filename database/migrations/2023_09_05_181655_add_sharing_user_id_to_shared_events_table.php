<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shared_events', function (Blueprint $table) {
            $table->string('sharing_user_id');
            $table->foreign('sharing_user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shared_events', function (Blueprint $table) {
            $table->dropForeign(['sharing_user_id']);
            $table->dropColumn('sharing_user_id');
        });
    }
};
