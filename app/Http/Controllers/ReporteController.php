<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use PDF;

class ReporteController extends Controller
{
    public function inventario()
    {
        $productos = Producto::all();
        $pdf = PDF::loadView('admin.reportes.inventario', compact('productos'));
        return $pdf->download('reporte_inventario.pdf');
    }

    public function rendimiento()
    {
        $productos = Producto::with('ventas')->get()->map(function($p) {
            $totalVendidos = $p->ventas->sum(function($v) {
                return $v->pivot->cantidad;
            });
            $totalFacturado = $p->ventas->sum(function($v) {
                return $v->pivot->cantidad * $v->pivot->precio;
            });
            $p->total_vendido = $totalVendidos;
            $p->total_facturado = $totalFacturado;
            return $p;
        });

        $pdf = PDF::loadView('admin.reportes.rendimiento', compact('productos'));
        return $pdf->download('reporte_rendimiento.pdf');
    }
}
