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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->unique();
            $table->string('username')->unique()->nullable();
            $table->tinyInteger('level')->default(0);
            $table->tinyInteger('role')->default(0)->comment('0 => user, 1 => admin');
            $table->tinyInteger('status')->default(0);
            $table->decimal('wallet')->nullable();
            $table->decimal('award_wallet')->nullable();
            $table->string('cart_number')->nullable();
            $table->string('shabba_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
