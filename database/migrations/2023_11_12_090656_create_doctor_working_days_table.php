<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctor_working_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->enum('work_day',[0,1,2,3,4,5,6,7]);
            $table->time('start_time');
            $table->time('end_time');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_working_days', function (Blueprint $table) {
            $table->dropForeign('doctor_working_days_doctor_id_foreign');
            $table->dropColumn('doctor_id');
        });
        Schema::dropIfExists('doctor_working_days');
    }
};
