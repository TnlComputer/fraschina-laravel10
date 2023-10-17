<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Expedicion') }}

    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        {{-- <table>
          <tr>
            <th>Razón social</th>
            <th colspan="4">Dirección</th>
            <th>Cod.Post</th>
            <th>Telefono</th>
          </tr>

          @forelse($expediciones as $expedicion)
          <tr>
            <td>{{ $expedision->razonsocial }}</td>
        <td>{{ $expedicion->dire_calle }}</td>
        <td>{{ $expedicion->dire_nro }}</td>
        <td>{{ $expedicion->piso }}</td>
        <td>{{ $expedicion->dpto }}</td>
        <td>{{ $expedicion->codpost }}</td>
        <td>{{ $expedicion->telefono }}</td>
        </tr>

        @empty
        <p>No hay registros para mostrar...</p>
        @endforelse
        {{ $expediciones->links() }}
        </table> --}}

      </div>
    </div>
  </div>
  </div>
</x-app-layout>
