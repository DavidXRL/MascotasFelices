<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'categoria', 'image_product'];

    public function ventas() {
        return $this->belongsToMany(Venta::class, 'producto_venta')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }

    public function pedidos() {
    return $this->belongsToMany(Pedido::class, 'pedido_producto')
                ->withPivot('cantidad', 'precio')
                ->withTimestamps();
}

}
