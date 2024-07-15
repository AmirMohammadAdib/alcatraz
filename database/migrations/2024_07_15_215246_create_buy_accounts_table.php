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
        Schema::create('buy_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->string('game_uid');
            $table->string('saler_price');
            $table->text('description')->nullable();
            $table->string('site_price');
            $table->string('email');
            $table->string('password');
            $table->tinyInteger('status')->default('0')->comment('0 => unseen, 1 => waiting, 2 => confirm, 3 => finished');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_accounts');
    }
};
