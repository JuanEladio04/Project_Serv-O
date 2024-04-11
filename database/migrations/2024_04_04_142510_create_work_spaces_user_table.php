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
        Schema::create('work_spaces_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_space_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('wk_role', ['creator', 'editor', 'reader'])->default('reader');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('work_space_id')->references('id')->on('work_spaces')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_spaces_user');
    }
};
