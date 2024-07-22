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
        Schema::create('d_calendars', function (Blueprint $table) {
            $table->id();
            $table->string('event_month')->nullable();
            $table->string('event_day')->nullable();
            $table->string('event_title')->nullable();
            $table->string('event_location')->nullable();
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
        Schema::dropIfExists('d_calendars');
    }
};
