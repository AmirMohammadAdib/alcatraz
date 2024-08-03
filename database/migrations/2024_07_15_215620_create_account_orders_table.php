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
        Schema::create('account_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("account_id")->constrained("accounts")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("payment_id")->constrained("payments")->onUpdate("cascade")->onDelete("cascade")->nullable();
            $table->string('receipt')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0 => unpayd, 1 => payd, 2 => waiting, 3 => finished');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_orders');
    }
};
