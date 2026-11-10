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
        Schema::table('category_blogs', function (Blueprint $table) {
            $table->string('brief_description')->nullable();
            $table->text('content')->nullable();
            $table->string('author')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_blogs', function (Blueprint $table) {
            $table->dropColumn(['brief_description', 'content', 'author']);
        });
    }
};
