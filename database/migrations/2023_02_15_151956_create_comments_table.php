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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->mediumText('content');
            $table->timestamps();

            // https://laravel.com/docs/9.x/migrations#foreign-key-constraints
            // $table->unsignedBigInteger('post_id'); // Clé étrangerère
            // $table->foreign('post_id')->references('id')->on('posts');
            // OU

            $table->foreignId('post_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
