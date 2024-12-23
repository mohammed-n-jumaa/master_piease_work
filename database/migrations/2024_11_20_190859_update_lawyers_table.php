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
        Schema::table('lawyers', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->string('last_name')->after('name'); 
        });
    }
    
    public function down()
    {
        Schema::table('lawyers', function (Blueprint $table) {
            $table->renameColumn('first_name', 'name'); 
            $table->dropColumn('last_name'); 
        });
    }
};
