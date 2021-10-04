<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Без имени');
            $table->enum('pin_type', ['text', 'file', 'link', 'img', 'type', 'type2', 'type3'])->default('text');
            $table->text('text')->nullable();
            $table->enum('type', ['group', 'user', 'folder']);
            $table->unsignedBigInteger('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pins');
    }
}
