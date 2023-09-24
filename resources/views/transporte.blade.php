<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transportes') }} Page

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

            @forelse($transportes as $transporte)
            <tr>
              <td>{{ $transporte->razonsocial }}</td>
              <td>{{ $transporte->dire_calle }}</td>
              <td>{{ $transporte->dire_nro }}</td>
              <td>{{ $transporte->piso }}</td>
              <td>{{ $transporte->dpto }}</td>
              <td>{{ $transporte->codpost }}</td>
              <td>{{ $transporte->telefono }}</td>
            </tr>

            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $transportes->links() }}
          </table>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
