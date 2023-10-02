<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Representacion') }} Edit
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-500  text-md">
          <table>
            <tr>
              {{-- <th>Razón social</th>
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
              <th>Comentarios</th> --}}
              <th>Apellido y Nombre</th>
              <th>Area</th>
              <th>Cargo</th>
              <th>Cateogria</th>
              <th>Tel Directo</th>
              <th>Interno</th>
              <th>Celular</th>
              <th>Tel.Partticular</th>
              <th>Profesión</th>
              <th>Información</th>
              <th>Email</th>
              <th>Fuera</th>


            </tr>


            @forelse($representaciones_personal as $representacion)

            <tr class="p-6 text-gray-900  text-xs">
              <td>{{ $representacion->apellido }} {{ $representacion->nombre }}</td>
              <td>{{ $representacion->area_id }}</td>
              <td>{{ $representacion->cargo_id }}</td>
              <td>{{ $representacion->categoriacargo_id }}</td>
              <td>{{ $representacion->teldirecto }}</td>
              <td>{{ $representacion->interno }}</td>
              <td>{{ $representacion->telcelular }}</td>
              <td>{{ $representacion->telparticular }}</td>
              <td>{{ $representacion->profesion_id }}</td>
              <td>{{ $representacion->infoenparticular }}</td>
              <td>{{ $representacion->email }}</td>
              <td>{{ $representacion->fuera }}</td>
            </tr>

            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $representaciones_personal->links() }}

          </table>

          {{-- <table>
            <tr>
              <th>Apellido y Nombre</th>
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
          </tr> --}}


          {{-- @forelse($representaciones_personal as $representacion_personal)
            <tr>
              <td>{{ $representacion_presonal->apellido }} {{ $representacion_presonal->nombre }}</td> --}}


          {{-- <td>{{ $representacion->dire_calle }} {{ $representacion->dire_nro }}
          {{ $representacion->piso }} {{ $representacion->dpto }}</td>
          <td>{{ $representacion->codpost }}</td>
          <td>{{ $representacion->telefono }}</td>
          <td>{{ $representacion->barrio }}</td>
          <td>{{ $representacion->localidad }}</td>
          <td>{{ $representacion->zona }}</td>
          <td>{{ $representacion->cuit }}</td>
          <td>{{ $representacion->email }}</td>
          <td>{{ $representacion->infoenparticular }}</td>
          <td>{{ $representacion->info }}</td>
          <td>{{ $representacion->comentarios }}</td> --}}
          </tr>

          {{-- @empty
            <p>No tiene registros para mostrar...</p>
            @endforelse
            {{ $representaciones_personal->links() }}
          </table> --}}


        </div>
      </div>
    </div>
  </div>
</x-app-layout>
