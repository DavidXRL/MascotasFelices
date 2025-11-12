<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Pedido</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pedidos.update', $pedido) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nombre del pedido</label>
            <input type="text" name="nombre" value="{{ old('nombre', $pedido->nombre) }}" class="border px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Proveedor</label>
            <select name="proveedor_id" class="border px-3 py-2 w-full" required>
                @foreach($proveedores as $prov)
                    <option value="{{ $prov->id }}" @if(old('proveedor_id', $pedido->proveedor_id) == $prov->id) selected @endif>{{ $prov->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label>Fecha</label>
            <input type="date" name="fecha" value="{{ old('fecha', $pedido->fecha) }}" class="border px-3 py-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Estado</label>
            <select name="estado" class="border px-3 py-2 w-full" required>
                <option value="Pendiente" @if(old('estado', $pedido->estado)=='Pendiente') selected @endif>Pendiente</option>
                <option value="Enviado" @if(old('estado', $pedido->estado)=='Enviado') selected @endif>Enviado</option>
                <option value="Recibido" @if(old('estado', $pedido->estado)=='Recibido') selected @endif>Recibido</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Actualizar Pedido</button>
    </form>
</div>
</x-app-layout>
