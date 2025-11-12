<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['proveedor_id', 'fecha', 'estado', 'nombre'];

    // Relación con proveedor
    public function proveedor() {
        return $this->belongsTo(Proveedor::class);
    }

    // Relación con productos
    public function productos() {
        return $this->belongsToMany(Producto::class, 'pedido_producto')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}
