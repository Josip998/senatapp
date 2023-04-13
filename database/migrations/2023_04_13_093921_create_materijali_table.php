<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterijaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materijali', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('filename');
            $table->unsignedBigInteger('tocka_id');
            $table->foreign('tocka_id')->references('id')->on('tocke')->onDelete('cascade');
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
        Schema::dropIfExists('materijali');
    }
}


