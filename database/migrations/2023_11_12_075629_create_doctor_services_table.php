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
        Schema::create('doctor_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('service_id');
            $table->unique(['doctor_id', 'service_id']);
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_services', function (Blueprint $table) {
            $table->dropForeign('doctor_services_doctor_id_foreign');
            $table->dropColumn('doctor_id');
            $table->dropForeign('doctor_services_service_id_foreign');
            $table->dropColumn('service_id');
        });
        Schema::dropIfExists('doctor_services');
    }
};
