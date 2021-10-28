<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogLandingGetGroupSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_landing_get_group_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('public_group_id');
            $table->foreign('public_group_id')->references('id')->on('public_group_slugs');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_landing_get_group_schedules');
    }
}
