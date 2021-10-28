<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogLandingSaveGroupSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_landing_save_group_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('public_group_id');
            $table->foreign('public_group_id')->references('id')->on('public_group_slugs');
            $table->boolean('is_new')->default(false);
            $table->boolean('is_authorize')->default(false);
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
        Schema::dropIfExists('log_landing_save_group_schedules');
    }
}
