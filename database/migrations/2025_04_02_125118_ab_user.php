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
        Schema::create('ab_user', function (Blueprint $table) {
            $table->id();
            $table->string('ab_name', 80)->unique();
            $table->string('ab_password', 200);
            $table->string('ab_mail', 200)->unique();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_user');
    }
};
