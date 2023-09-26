<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Distribución Page
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900  text-xs">

          <table>
            <tr>
              <th>Razón social</th>
              <th colspan="4">Dirección</th>
              <th>Cod.Post</th>
              <th>Telefono</th>
            </tr>

            @forelse($distribuciones as $distribucion)
            <tr>
              <td>{{ $distribucion->razonsocial }}</td>
              <td>{{ $distribucion->dire_calle }}</td>
              <td>{{ $distribucion->dire_nro }}</td>
              <td>{{ $distribucion->piso }}</td>
              <td>{{ $distribucion->dpto }}</td>
              <td>{{ $distribucion->codpost }}</td>
              <td>{{ $distribucion->telefono }}</td>
            </tr>
            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $distribuciones->links() }}
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
