<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Distribución') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class="barra__index">
            <div class="div__nuevo">
              <form action="{{  route('distribucion.create') }}">
                <input class="btn__nuevo" type="submit" value="Nueva Distribución">
              </form>
            </div>
            <div class="div__buscar">
              <form method="get" action="{{  route('distribucion.index') }}" class="form__buscar">
                @csrf
                <span class="span__input-buscar">
                  <input type="text" placeholder="Type to search" name="name" value="{{ old('name') }}" class="input__buscar">
                </span>
                <span class="span__btn-buscar">
                  <input type="submit" value="Buscar" class="btn__buscar">
                </span>
              </form>
            </div>
          </div>
          <table>
            {{-- <tr class=" bg-black text-white text-left"> --}}
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th>Nro.GS</th>
                <th>Nombre Fantasía</th>
                <th>Razón social</th>
                <th>Dirección</th>
                <th>Barrio</th>
                <th>Localidad</th>
                <th>Municipio</th>
                <th>Zona</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th></th>
              </tr>
            </thead>

            @forelse($distribuciones as $distribucion)
            <tr>
              <td>
                <a href="{{ route('distribucion.show', $distribucion->id) }}" class="">
                  <i class="fa-regular fa-eye fa-md"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('distribucion.edit', $distribucion->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square fa-md" style="color: #13b60d;"></i>
                </a>
              </td>

              <td>
                @if($distribucion->clisg_id != 0)
                {{ $distribucion->clisg_id }}
                @endif
              </td>
              <td data-titulo="Nombre Fantasía">{{ $distribucion->nomfantasia }}</td>
              <td data-titulo="Razón social">{{ $distribucion->razonsocial}}
              <td data-titulo="Dirección"> {{ $distribucion->dire_calle }}
                {{ $distribucion->dire_nro }}
                @if($distribucion->piso != '')
                {{ $distribucion->piso }}
                @endif
                @if($distribucion->dpto != '')
                Piso {{ $distribucion->dpto }}
                @endif
                @if($distribucion->codpost != '')
                - ({{ $distribucion->codpost }})
                @endif
              <td data-titulo="Barrio">{{ $distribucion->barrio }}</td>
              <td data-titulo="Localidad">{{ $distribucion->localidad }}</td>
              <td data-titulo="Municipio">{{ $distribucion->municipio }}</td>
              <td data-titulo="Zona">{{ $distribucion->zona }}</td>
              <td data-titulo="Teléfono">{{ $distribucion->telefono }}</td>
              <td data-titulo="Email">{{ $distribucion->correo }}</td>
              <td>
                <form method="POST" action="{{ route('distribucion.destroy', $distribucion->id) }}" class="ocultar">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class='fa-solid fa-trash fa-md' style="color: #ff0000;"></i> </button>
                </form>
              </td>
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
