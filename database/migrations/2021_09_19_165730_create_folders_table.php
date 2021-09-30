<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Без имени');
            $table->string('desc')->nullable();
            $table->enum('type', ['group', 'user', 'folder']);
            $table->enum('color', ['gray', 'blue', 'red', 'orange', 'yellow', 'green', 'teal', 'indigo', 'purple', 'pink'])->default('indigo');
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
        Schema::dropIfExists('folders');
    }
}
