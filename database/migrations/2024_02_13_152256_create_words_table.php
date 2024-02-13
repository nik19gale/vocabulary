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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('alpha', 300);
            $table->string('beta', 300);
            $table->foreignId('part_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->integer('score')->default(0);

            $table->unique(['alpha', 'part_id']);
            $table->index('alpha');
            $table->index('beta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
