<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSjedniceTable extends Migration
{
    public function up()
    {
        Schema::create('sjednice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('start_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sjednice');
    }
}
