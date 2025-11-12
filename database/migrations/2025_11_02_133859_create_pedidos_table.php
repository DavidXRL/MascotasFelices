<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
       Schema::create('pedidos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('proveedor_id')->constrained('proveedors'); // tu tabla de proveedores
    $table->date('fecha');
    $table->string('estado');
    $table->timestamps();
});

    }

    public function down(): void {
        Schema::dropIfExists('pedidos');
    }
};

