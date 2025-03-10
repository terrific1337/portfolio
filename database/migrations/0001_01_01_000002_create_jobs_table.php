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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('companyname'); // Company name
            $table->date('startdate'); // Start date
            $table->date('enddate')->nullable(); // End date (nullable in case it's ongoing)
            $table->text('companydescription')->nullable(); // Description of the company
            $table->string('location'); // Job location
            $table->string('jobtitle'); // Job title
            $table->enum('status', ['active', 'inactive', 'completed']); // Job status
            $table->boolean('intern')->default(false); // Is it an internship?
            $table->string('contactperson')->nullable(); // Contact person
            $table->timestamps(); // created_at and updated_at
            $table->text('jobdescription')->nullable(); // Job description
            $table->string('companysector')->nullable(); // Company sector
            $table->string('companywebsite')->nullable(); // Company website
            $table->string('companylogo')->nullable(); // Company logo path
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
