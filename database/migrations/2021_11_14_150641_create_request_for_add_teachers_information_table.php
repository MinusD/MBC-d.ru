<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestForAddTeachersInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_for_add_teachers_information', function (Blueprint $table) {
            $table->id();
            $table->string('short_name');
//            $table->string('name')->nullable();
//            $table->string('email')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('request_for_add_teachers_information');
    }
}
