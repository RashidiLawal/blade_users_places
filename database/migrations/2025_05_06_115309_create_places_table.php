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
        Schema::create('places', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title'); // Title of the place
            $table->text('description')->nullable(); // Description of the place
            $table->string('address')->nullable(); // Address of the place
            $table->foreignId('creator_id')->constrained()->onDelete('cascade'); // Foreign key for user
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};

