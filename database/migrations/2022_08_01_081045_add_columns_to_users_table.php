<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image');
            $table->string('phone');
            $table->string('address');
            $table->text('description');
            $table->string('level');
            $table->string('gender');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('description');
            $table->dropColumn('level');
            $table->dropColumn('gender');
            $table->dropForeign('role_id');
            $table->dropColumn('role_id');
        });
    }
}
