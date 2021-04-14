<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->string('name')->after('password');
            $table->string('email')->after('name');
            $table->string('phone')->after('email');
            $table->unsignedBigInteger('team_id')->after('phone');
            $table->foreign('team_id')->references('id')->on('teams');
            $table->unsignedBigInteger('role_id')->after('team_id');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            //
        });
    }
}
