<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSpecializationColumnInLawyersTable extends Migration
{
    /**
     * تشغيل التغييرات.
     */
    public function up()
    {
        Schema::table('lawyers', function (Blueprint $table) {
            $table->unsignedBigInteger('specialization')->nullable()->change(); // تغيير نوع الحقل إلى BIGINT
        });
    }

    /**
     * التراجع عن التغييرات.
     */
    public function down()
    {
        Schema::table('lawyers', function (Blueprint $table) {
            $table->string('specialization')->nullable()->change(); // العودة إلى VARCHAR
        });
    }
}
