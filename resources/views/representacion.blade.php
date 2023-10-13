<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Representaciones') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900  text-xs">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch gap-36">
            <a href="{{ route('representacion.create') }}">
              <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nueva Representación</button>
            </a>
            <form method="post" action="{{  route('representacion.search') }}" class="py-2">

              @csrf
              <input type="text" placeholder="Type to search" name="name" value="{{ old('name') }}">
              <button type="submit" class="p-2 bg-gray-700 text-white sm:rounded-lg">Buscar</button>
            </form>
          </div>

          <table>
            <tr class=" bg-black text-white text-left">
              <th></th>
              <th></th>
              <th class="w-2/12">Razón social</th>
              <th class="w-1/12">Dirección</th>
              <th class="w-1/12">Cod.Post</th>
              <th class="w-1/12">Barrio</th>
              <th class="w-1/12">Localidad</th>
              <th class="w-1/12">Zona</th>
              <th class="w-1/12">Telefono</th>
              <th class="w-1/12">Email</th>
              <th class="w-1/12">Cuit</th>
              <th class="w-1/12">Marcas</th>
              {{-- <th class="w-3/12">Información</th> --}}
              <th></th>
            </tr>


            @forelse($representaciones as $representacion)
            <tr class="p-2 text-gray-900  text-xs align-text-top text-left">
              <td>
                <a href="{{ route('representacion.show', $representacion->id) }}" class="">
                  <i class="fa-regular fa-eye fa-sm"></i>
                  {{-- <i class="fa-regular fa-eye"></i> --}}
                </a>
              </td>
              <td></td>
              <td class="w-1/12">{{ $representacion->razonsocial }}</td>
              <td class="w-2/12">{{ $representacion->dire_calle }} {{ $representacion->dire_nro }}
                {{ $representacion->piso }} {{ $representacion->dpto }}</td>
              <td class="w-1/12">{{ $representacion->codpost }}</td>
              <td class="w-1/12">{{ $representacion->barrio }}</td>
              <td class="w-1/12">{{ $representacion->localidad }}</td>
              <td class="w-1/12">{{ $representacion->zona }}</td>
              <td class="w-1/12">{{ $representacion->telefono }}</td>
              <td class="w-1/12">{{ $representacion->correo }}</td>
              <td class="w-1/12">{{ $representacion->cuit }}</td>
              <td class="w-1/12">{{ $representacion->marcas }}</td>
              {{-- <td class="w-3/12">{{ $representacion->info }}</td> --}}
              {{-- <td>{{ $representacion->comentarios }}</td> --}}
              <td>
                <form method="POST" action="{{ route('representacion.destroy', $representacion->id) }}">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class='fa-solid fa-trash fa-sm' style="color: #ff0000;"></i> </button>
                </form>
              </td>


            </tr>

            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $representaciones->links() }}
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
