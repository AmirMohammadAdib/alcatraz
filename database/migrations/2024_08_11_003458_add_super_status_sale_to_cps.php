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
        Schema::table('cps', function (Blueprint $table) {
            $table->tinyInteger('super_status_sale')->default(0)->comment('0 => inactive, 1 => active')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cps', function (Blueprint $table) {
            //
        });
    }
};
