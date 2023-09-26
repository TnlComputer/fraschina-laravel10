<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Molinos') }} Page

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

            @forelse($molinos as $molino)
            <tr>
              <td>{{ $molino->razonsocial }}</td>
              <td>{{ $molino->dire_calle }}</td>
              <td>{{ $molino->dire_nro }}</td>
              <td>{{ $molino->piso }}</td>
              <td>{{ $molino->dpto }}</td>
              <td>{{ $molino->codpost }}</td>
              <td>{{ $molino->telefono }}</td>
            </tr>

            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $molinos->links() }}
          </table>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
