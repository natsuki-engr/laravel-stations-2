<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('sheet_id')->constrained('sheets');
            $table->string('email');
            $table->string('name');
            $table->boolean('is_canceled')->default(false);
            $table->timestamps();

            $table->unique(['schedule_id', 'sheet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['schedule_id']);
            $table->dropForeign(['sheet_id']);
            $table->dropIfExists('reservations');
        });
    }
}
