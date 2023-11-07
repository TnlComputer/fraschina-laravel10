<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      @include('layouts.dist_menu')
    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class="barra__index">
            {{-- <div class="div__nuevo">
              <form action="{{  route('distribucion.agenda.create') }}">
            <input class="btn__nuevo" type="submit" value="Nuevo">
            </form>
          </div> --}}
          {{-- <div class="div__buscar">
          <form method="get" action="{{  route('distribucion.agenda.index') }}" class="form__buscar">
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

        @forelse($agendas as $agenda)
        <tr>
          <td>
            <a href="{{ route('distribucion.agenda.show', $agenda->id) }}" class="">
              <i class="fa-regular fa-eye icon-view"></i>

            </a>
          </td>
          <td>
            <a href="{{ route('distribucion.agenda.edit', $agenda->id) }}" class="ocultar ">
              <i class="fa-regular fa-pen-to-square icon-edit"></i>

            </a>
          </td>

          <td>
            @if($agenda->clisg_id != 0)
            {{ $agenda->clisg_id }}
            @endif
          </td>
          <td data-titulo="Nombre Fantasía">{{ $agenda->nomfantasia }}</td>
          <td data-titulo="Razón social">{{ $agenda->razonsocial}}
          <td data-titulo="Dirección"> {{ $agenda->dire_calle }}
            {{ $agenda->dire_nro }}
            @if($agenda->piso != '')
            {{ $agenda->piso }}
            @endif
            @if($agenda->dpto != '')
            Piso {{ $agenda->dpto }}
            @endif
            @if($agenda->codpost != '')
            - ({{ $agenda->codpost }})
            @endif
          <td data-titulo="Barrio">{{ $agenda->barrio }}</td>
          <td data-titulo="Localidad">{{ $agenda->localidad }}</td>
          <td data-titulo="Municipio">{{ $agenda->municipio }}</td>
          <td data-titulo="Zona">{{ $agenda->zona }}</td>
          <td data-titulo="Teléfono">{{ $agenda->telefono }}</td>
          <td data-titulo="Email">{{ $agenda->correo }}</td>
          <td>
            <form method="POST" action="{{ route('distribucion.agenda.destroy', $agenda->id) }}" class="ocultar">
              @csrf
              @method(' DELETE')
              <button type="submit"><i class="fa-solid fa-trash icon-delete"></i> </button>

            </form>
          </td>
        </tr>
        @empty
        <p>No hay registros para mostrar...</p>
        @endforelse
        {{ $agendas->links() }}
      </table> --}}
    </div>
  </div>
  </div>
  </div>
</x-app-layout>
