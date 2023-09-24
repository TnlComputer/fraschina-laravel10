<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Agros') }} Page

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

            @forelse($agros as $agro)
            <tr>
              <td>{{ $agro->razonsocial }}</td>
              <td>{{ $agro->dire_calle }}</td>
              <td>{{ $agro->dire_nro }}</td>
              <td>{{ $agro->piso }}</td>
              <td>{{ $agro->dpto }}</td>
              <td>{{ $agro->codpost }}</td>
              <td>{{ $agro->telefono }}</td>
            </tr>

            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $agros->links() }}
          </table>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
