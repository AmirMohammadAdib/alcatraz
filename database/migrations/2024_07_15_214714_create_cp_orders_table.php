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
        Schema::create('cp_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("cp_id")->constrained("cps")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("payment_id")->constrained("payments")->onUpdate("cascade")->onDelete("cascade");
            $table->tinyInteger('status')->default('0')->comment('0 => un payed, 1 => payed, 2 => finished');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cp_orders');
    }
};
