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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->tinyInteger('status')->comment('0 => waiting, 1 => finished, 2 => canceled')->default(0);
            $table->string('transaction_code')->nullable();
            $table->string('receipt')->nullable()->comment('receipt picture');
            $table->decimal('amount', 10, 2);
            $table->string('cart_number_freezer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
