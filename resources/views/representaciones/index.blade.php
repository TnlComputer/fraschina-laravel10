<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Representaciones') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-500  text-md">
          <table>
            <tr>
              <th>Acciones</th>
              <th>Razón social</th>
              <th>Dirección</th>
              <th>Cod.Post</th>
              <th>Telefono</th>
              <th>Barrio</th>
              <th>Localidad</th>
              <th>Zona</th>
              <th>Cuit</th>
              <th>Email</th>
              <th>Marcas</th>
              <th>Información</th>
              <th>Comentarios</th>
            </tr>
            @forelse($representaciones as $representacion)
            <tr class="p-6 text-gray-900  text-xs">
              <td>
                <l><a href="{{ route('Representacion.show', $representacion->id) }}">{{ $representacion->id }}</a> | <a href="{{ route('Representacion.edit', $representacion->id) }}">Edit</a>| <form method="POST" action="{{ route('Representacion.destroy', $representacion->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                  </form>
              </td>
              <td>{{ $representacion->razonsocial }}</td>
              <td>{{ $representacion->dire_calle }} {{ $representacion->dire_nro }}
                {{ $representacion->piso }} {{ $representacion->dpto }}</td>
              <td>{{ $representacion->codpost }}</td>
              <td>{{ $representacion->telefono }}</td>
              <td>{{ $representacion->barrio_id }}</td>
              <td>{{ $representacion->localidad_id }}</td>
              <td>{{ $representacion->zona }}</td>
              <td>{{ $representacion->cuit }}</td>
              <td>{{ $representacion->email }}</td>
              <td>{{ $representacion->infoenparticular }}</td>
              <td>{{ $representacion->info }}</td>
              <td>{{ $representacion->comentarios }}</td>
            </tr>
            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $representaciones->links() }}
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
