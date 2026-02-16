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
        Schema::create('members', function (Blueprint $table) {
            $table->id();                      // ID（自動採番）
            $table->string('name', 15);        // 名前（最大15文字）
            $table->string('phone', 15);       // 電話番号（最大15文字）
            $table->string('email', 254);      // メールアドレス（最大254文字）
            $table->timestamps();              // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};