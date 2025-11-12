<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Venta #{{ $venta->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Venta #{{ $venta->id }}</h2>
    <p><strong>Cliente:</strong> {{ $venta->cliente->nombre }}</p>
    <p><strong>Fecha:</strong> {{ $venta->fecha }}</p>
    <p><strong>Método de pago:</strong> {{ $venta->metodo_pago }}</p>
    <p><strong>Total:</strong> ${{ number_format($venta->total, 2) }}</p>

    <h3>Productos</h3>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->productos as $prod)
            <tr>
                <td>{{ $prod->nombre }}</td>
                <td>{{ $prod->pivot->cantidad }}</td>
                <td>${{ number_format($prod->pivot->precio, 2) }}</td>
                <td>${{ number_format($prod->pivot->cantidad * $prod->pivot->precio, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
