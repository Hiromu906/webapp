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
            $table->unsignedInteger('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title',255);
            $table->datetime('start_time')->nullable(false);
            $table->datetime('end_time')->nullable(false);
            $table->string('location',255)->nullable();
            $table->text('description')->nullable();
            $table->timestamp('send_at');
            $table->tinyInteger('is_release')->default(0);
            $table->timestamps();
            $table->softDeletes();
            
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
