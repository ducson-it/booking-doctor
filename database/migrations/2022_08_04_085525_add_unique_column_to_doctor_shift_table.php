<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueColumnToDoctorShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor_shift', function (Blueprint $table) {
            $table->unique(['shift_doctor_id', 'doctor_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_shift', function (Blueprint $table) {
            $table->dropunique(['shift_doctor_id', 'doctor_id', 'date   ']);
        });
    }
}
