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
    $t->string('customer_name');   // şimdilik ayrı tabloya bağlamadan müşteri adını tut
    $t->string('invoice_number')->unique();
    $t->decimal('amount', 10, 2);  // toplam tutar
    $t->date('invoice_date');      // düzenlenme tarihi
    $t->date('due_date');          // son ödeme tarihi
    $t->enum('status', ['pending','paid'])->default('pending'); // sadece 2 durum
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
