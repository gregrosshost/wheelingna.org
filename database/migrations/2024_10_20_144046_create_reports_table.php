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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('date_submitted');
            $table->string('submitted_by');
            $table->string('report_type'); // Will store 'secretary', 'subcommittee', 'group'
            $table->text('report_text')->nullable(); // If the report is text-based
            $table->string('file_upload')->nullable(); // If the report is file-based
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
