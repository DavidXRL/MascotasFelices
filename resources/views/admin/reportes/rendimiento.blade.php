<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rendimiento de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #1C3D5C;
            margin-bottom: 20px;
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background-color: #1C3D5C;
            color: #fff;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tfoot {
            font-weight: bold;
            background-color: #1C3D5C;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Rendimiento de Productos</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Total Vendido</th>
                <th>Total Facturado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->categoria ? $producto->categoria->categoria_nombre : 'Sin categoría' }}</td>
                <td>{{ $producto->total_vendido }}</td>
                <td>${{ number_format($producto->total_facturado, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
