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
        Schema::create('invoices', function (Blueprint $t) {
    $t->id();
    $t->string('invoice_number')->unique();
    $t->string('customer')->nullable();
    $t->decimal('amount', 10, 2);  // toplam tutar
    $t->enum('status', ['paid' ,'unpaid'])->default('unpaid');
    $t->string('type')->nullable();
    $t->timestamps();
});

    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
