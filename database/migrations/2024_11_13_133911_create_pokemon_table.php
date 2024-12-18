<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pokemon', function (Blueprint $table) {
        $table->id();
        $table->string('name', 50)->unique();
        $table->string('type', 50);
        $table->integer('evolution');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('pokemon');
}

};
