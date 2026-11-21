<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('WFP')) {
            Schema::create('WFP', function (Blueprint $table) {
                $table->id();
                $table->string('Learner_Code')->unique()->nullable();
                $table->string('Learner_Name')->nullable();
                $table->string('Date')->nullable();
                $table->string('Course_Name')->nullable();
                $table->string('Track')->nullable();
                $table->string('Training_Duration')->nullable();
                $table->string('Training_Area')->nullable();
                $table->string('مدة التدريب')->nullable();
                $table->string('التدريب')->nullable();
                $table->string('التخصص')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('WFP');
    }
};
