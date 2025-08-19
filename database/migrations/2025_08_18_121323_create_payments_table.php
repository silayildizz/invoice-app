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
        Schema::create('payments', function (Blueprint $t) {
    $t->id();
    $t->foreignId('invoice_id')->constrained()->cascadeOnDelete();
    $t->decimal('amount', 12, 2);
    $t->enum('method', ['cash','card','transfer','other'])->default('transfer');
    $t->dateTime('paid_at');
    $t->string('note')->nullable();
    $t->timestamps();
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
