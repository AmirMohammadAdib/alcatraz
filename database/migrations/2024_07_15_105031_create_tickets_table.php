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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->text('description');
            $table->string('file');
            $table->tinyInteger('periority')->default(0);
            $table->tinyInteger("seen")->default(0)->comment("0 => UnSeen, 1 => Seen");
            $table->foreignId("user_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("admin_id")->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("ticket_id")->nullable()->constrained("tickets")->onUpdate("cascade")->onDelete("cascade");
            $table->tinyInteger('status')->default(0)->comment('0 => open, 1 => close');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
