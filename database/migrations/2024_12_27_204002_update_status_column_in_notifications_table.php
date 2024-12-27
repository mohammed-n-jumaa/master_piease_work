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
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    
        Schema::table('notifications', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('inactive');
        });
    }
    
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    
        Schema::table('notifications', function (Blueprint $table) {
            $table->enum('status', ['unread', 'read'])->default('unread');
        });
    }
    
    
};
