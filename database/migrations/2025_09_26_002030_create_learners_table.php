<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('learners')) {
            Schema::create('learners', function (Blueprint $table) {
                $table->id();
                $table->string('learner_code')->unique();
                $table->string('learner_name');
                $table->string('client_name')->nullable();
                $table->string('program_name')->nullable();
                $table->date('awarded_date')->nullable();
                $table->string('image_name')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('learners', function (Blueprint $table) {
                if (!Schema::hasColumn('learners', 'client_name')) {
                    $table->string('client_name')->nullable();
                }
                if (!Schema::hasColumn('learners', 'program_name')) {
                    $table->string('program_name')->nullable();
                }
                if (!Schema::hasColumn('learners', 'awarded_date')) {
                    $table->date('awarded_date')->nullable();
                }
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('learners');
    }
};
