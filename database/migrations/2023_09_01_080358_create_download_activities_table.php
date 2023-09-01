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
        Schema::create('download_activities', function (Blueprint $table) {
            $table->id();
            $table->ipAddress()->nullable();
            $table->string('user_agent')->nullable();
            $table->foreignIdFor(\App\Models\FileSharing::class,'file_id');
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_activities');
    }
};
