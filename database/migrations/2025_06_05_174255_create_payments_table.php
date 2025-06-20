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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('account_type');
            $table->string('account_name');
            $table->string('client_email')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('platform')->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('time');
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
