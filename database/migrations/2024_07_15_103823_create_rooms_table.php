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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->text('link');
            $table->decimal('fee', 10, 2)->nullable();
            $table->decimal('award', 10, 2)->nullable();
            $table->integer('winners')->comment('count of winners')->nullable();
            $table->integer('per_killed')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->integer('capacity')->default(0)->comment('count of players that can be match');
            $table->integer('players')->default(0)->comment('count of current players');
            $table->tinyInteger('status')->default(0)->comment('0 => waiting to start, 1 => in process, 2 => finished, 3 => canceled');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
