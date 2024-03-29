<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('headman_id');
            $table->foreign('headman_id')->references('id')->on('users');
            $table->unsignedBigInteger('zam_id')->nullable();
            $table->foreign('zam_id')->references('id')->on('users');
            $table->string('group_name');
            $table->integer('fs_code')->nullable();
            $table->integer('fs_pass')->nullable();
            $table->tinyInteger('verification_level')->default(0);
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
        Schema::dropIfExists('groups');
    }
}
