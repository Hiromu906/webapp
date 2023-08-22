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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->varchar('title',255);
            $table->datetime('start_time')->nullable(false);
            $table->datetime('end_time')->nullable(false);
            $table->varchar('location',255);
            $table->text('description');
            $table->timestamp('send_at');
            $table->tinyInteger('is_release',1);
            $table->timestamps();
            $table->softDeketes();
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
};
