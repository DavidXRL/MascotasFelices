<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Venta</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ventas.update', $venta) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Cliente</label>
            <select name="cliente_id" class="border p-2 w-full" required>
                @foreach($clientes as $cli)
                    <option value="{{ $cli->id }}" @if($venta->cliente_id == $cli->id) selected @endif>{{ $cli->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Fecha</label>
            <input type="date" name="fecha" value="{{ $venta->fecha }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Método de pago</label>
            <select name="metodo_pago" class="border p-2 w-full" required>
                <option value="Efectivo" @if($venta->metodo_pago=='Efectivo') selected @endif>Efectivo</option>
                <option value="Tarjeta" @if($venta->metodo_pago=='Tarjeta') selected @endif>Tarjeta</option>
                <option value="Transferencia" @if($venta->metodo_pago=='Transferencia') selected @endif>Transferencia</option>
            </select>
        </div>

        <h2 class="text-xl font-semibold mb-2">Productos</h2>
        <div id="productos-container">
            @foreach($venta->productos as $prod)
            <div class="producto-item mb-2 flex gap-2">
                <select name="productos[]" class="border p-2 producto-select" required onchange="actualizarPrecio(this)">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}"
                            @if($prod->id == $producto->id) selected @endif>
                            {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                        </option>
                    @endforeach
                </select>
                <input type="number" name="cantidades[]" min="1" value="{{ $prod->pivot->cantidad }}" class="border p-2 cantidad-input" required>
                <input type="number" name="precios[]" step="0.01" value="{{ $prod->pivot->precio }}" class="border p-2 precio-input" readonly required>
                <button type="button" onclick="this.parentNode.remove(); actualizarTotal();" class="bg-red-500 text-white px-2 rounded">X</button>
            </div>
            @endforeach
        </div>

        <button type="button" onclick="agregarProducto()" class="bg-blue-500 text-white px-3 py-1 mt-2 rounded">Agregar Producto</button>

        <div class="mb-4 mt-4">
            <label>Total</label>
            <input type="number" id="total" name="total" value="{{ $venta->total }}" class="border p-2 w-full" readonly required>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-green-500 text-white px-3 py-2 rounded">Actualizar Venta</button>
        </div>
    </form>
</div>

<script>
function actualizarPrecio(select) {
    let precioInput = select.parentNode.querySelector('.precio-input');
    let precio = parseFloat(select.options[select.selectedIndex].dataset.precio);
    precioInput.value = precio.toFixed(2);
    actualizarTotal();
}

function agregarProducto() {
    let container = document.getElementById('productos-container');
    let div = document.createElement('div');
    div.className = 'producto-item mb-2 flex gap-2';
    div.innerHTML = `
        <select name="productos[]" class="border p-2 producto-select" required onchange="actualizarPrecio(this)">
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">
                    {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                </option>
            @endforeach
        </select>
        <input type="number" name="cantidades[]" min="1" value="1" placeholder="Cantidad" class="border p-2 cantidad-input" required>
        <input type="number" name="precios[]" step="0.01" value="{{ $productos->first()->precio ?? 0 }}" class="border p-2 precio-input" readonly required>
        <button type="button" onclick="this.parentNode.remove(); actualizarTotal();" class="bg-red-500 text-white px-2 rounded">X</button>
    `;
    container.appendChild(div);
    actualizarTotal();
}

function actualizarTotal() {
    let total = 0;
    document.querySelectorAll('#productos-container .producto-item').forEach(item => {
        let cantidad = parseFloat(item.querySelector('.cantidad-input').value);
        let precio = parseFloat(item.querySelector('.precio-input').value);
        total += cantidad * precio;
    });
    document.getElementById('total').value = total.toFixed(2);
}


window.onload = actualizarTotal;
</script>
</x-app-layout>
