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
        Schema::table('pokemon', function (Blueprint $table) {
            $table->decimal('weight', 8, 2)->after('type')->nullable(); // Peso con dos decimales
            $table->decimal('height', 8, 2)->after('weight')->nullable(); // Altura con dos decimales
        });
    }
    
    public function down()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            $table->dropColumn(['weight', 'height']);
        });
    }
};    
