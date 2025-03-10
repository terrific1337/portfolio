<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Projects Table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('repo')->nullable();
            $table->string('screenshot')->nullable();
            $table->string('demo')->nullable();
            $table->enum('status', ['in progress','completed','planned']);
            $table->enum('category', ['personal','school','work']);
            $table->boolean('featured')->default(false);
            $table->integer('order')->nullable();
        });

        // Tags Table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        // Pivot Table (Many-to-Many)
        Schema::create('project_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('projects');
    }
};
