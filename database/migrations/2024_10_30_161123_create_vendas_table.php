<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id('id_venda');
            $table->foreignId('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreignId('id_vendedor')->references('id_vendedor')->on('vendedores')->onDelete('cascade');
            $table->date('data_venda')->nullable();
            $table->decimal('total_venda', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};

