<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Proveedores') }} Page

    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <table>
            <tr>
              <th>Razón social</th>
              <th colspan="4">Dirección</th>
              <th>Cod.Post</th>
              <th>Telefono</th>
            </tr>

            @forelse($proveedores as $proveedor)
            <tr>
              <td>{{ $proveedor->razonsocial }}</td>
              <td>{{ $proveedor->dire_calle }}</td>
              <td>{{ $proveedor->dire_nro }}</td>
              <td>{{ $proveedor->piso }}</td>
              <td>{{ $proveedor->dpto }}</td>
              <td>{{ $proveedor->codpost }}</td>
              <td>{{ $proveedor->telefono }}</td>
            </tr>

            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $proveedores->links() }}
          </table>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
