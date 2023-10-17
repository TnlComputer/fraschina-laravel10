<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-left">
      {{ __('Representacion') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <a class="ocultar" href="{{ route('representacion.create') }}">
              <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nueva Representación</button>
            </a>
            <form method="post" action="{{  route('representacion.search') }}" class="px-6">
              @csrf
              <input type="text" placeholder="Type to search" name="name" value="{{ old('name') }}">
              <button type="submit" class="p-2 bg-gray-700 text-white sm:rounded-lg">Buscar</button>
            </form>
          </div>
          <table>
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th class="">Razón social</th>
                <th class="">Dirección</th>
                <th class="">Barrio</th>
                <th class="">Localidad</th>
                <th class="">Zona</th>
                <th class="">Teléfono</th>
                <th class="">Email</th>
                <th class="">Cuit</th>
                <th class="">Marcas</th>
                <th></th>
              </tr>
            </thead>

            @forelse($representaciones as $representacion)
            <tr>
              <td>
                <a href="{{ route('representacion.show', $representacion->id) }}" class="">
                  <i class="fa-regular fa-eye fa-md"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('representacion.edit', $representacion->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square fa-md" style="color: #13b60d;"></i>
                </a>
              </td>
              <td data-titulo="Razón social">{{ $representacion->razonsocial }}</td>
              <td data-titulo="Dirección">
                {{ $representacion->dire_calle }}
                {{ $representacion->dire_nro }}
                @if($representacion->piso != '')
                {{ $representacion->piso }}
                @endif
                @if($representacion->dpto != '')
                Piso {{ $representacion->dpto }}
                @endif
                @if($representacion->codpost != '')
                - ({{ $representacion->codpost }})
                @endif
              </td>
              <td data-titulo="Barrio">{{ $representacion->barrio }}</td>
              <td data-titulo="Localidad">{{ $representacion->localidad }}</td>
              <td data-titulo="Zona">{{ $representacion->zona }}</td>
              <td data-titulo="Teléfono">{{ $representacion->telefono }}</td>
              <td class="" data-titulo="Email">{{ $representacion->correo }}</td>
              <td data-titulo="Cuit">{{ $representacion->cuit }}</td>
              <td data-titulo="Marcas">{{ $representacion->marcas }}</td>

              {{-- <td class="w-3/12">{{ $representacion->info }}</td> --}}
              {{-- <td>{{ $representacion->comentarios }}</td> --}}
              <td>
                <form method="POST" action="{{ route('representacion.destroy', $representacion->id) }}" class="ocultar">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class='fa-solid fa-trash fa-md' style="color: #ff0000;"></i> </button>
                </form>
              </td>


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
