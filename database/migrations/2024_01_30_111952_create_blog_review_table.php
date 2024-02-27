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
        Schema::create('blog_review', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('blog_id');
            $table->text('review');
            $table->integer('status');
            $table->date('added_on')->format('Y-m-d');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_review');
    }
};
