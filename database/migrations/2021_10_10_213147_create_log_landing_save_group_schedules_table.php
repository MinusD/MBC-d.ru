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
            $table->string('group_slug');
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
