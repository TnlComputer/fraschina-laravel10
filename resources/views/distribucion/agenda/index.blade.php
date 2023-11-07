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
            <div class="div__nuevo">
              <form action="{{  route('distribucion_agenda.create') }}">
                <input class="btn__nuevo" type="submit" value="Nuevo">
              </form>
            </div>
            <div class="div__buscar">
              <form method="get" action="{{  route('distribucion_agenda.index') }}" class="form__buscar">
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
                <th>Fecha</th>
                <th>Hora</th>
                <th>Hora</th>
                <th>Prioridad</th>
                <th>Nombre Fantasía</th>
                <th>Razón Social</th>
                <th>Contacto</th>
                <th>Cargo</th>
                <th>Teléfono</th>
                <th>Veráz</th>
                <th>Estado</th>
                <th>Accion</th>
                <th>Temas</th>
                <th></th>
              </tr>
            </thead>

            @forelse($agendas as $agenda)
            <tr>
              <td>
                <a href="{{ route('distribucion_agenda.show', $agenda->distribucion_id) }}" class="">
                  <i class="fa-regular fa-eye icon-view"></i>

                </a>
              </td>
              <td>
                <a href="{{ route('distribucion_agenda.edit', $agenda->id) }}">
                  <i class="fa-regular fa-pen-to-square icon-edit"></i>

                </a>
              </td>
              <td data-titulo="Fecha">{{ $agenda->fecha }}</td>
              <td data-titulo="Hora"> {{ $agenda->horas}}
              <td data-titulo="Auto"> {{ $agenda->auto}}
              <td data-titulo="Prioridad">
                @if($agenda->colorPrio == 'Rojo')
                <font color="#FF0000"> {{ $agenda->prioridad }}</font>
                @endif
                @if($agenda->colorPrio == 'Verde')
                <font color="#005712"> {{ $agenda->prioridad }}</font>
                @endif
                @if($agenda->colorPrio == 'Azul')
                <font color="blue"> {{ $agenda->prioridad }}</font>
                @endif
              <td data-titulo="Nombre Fantasía">{{ $agenda->nomfantasia }}</td>
              <td data-titulo="Razón social">{{ $agenda->razonsocial }}</td>
              <td data-titulo="Contacto">{{ $agenda->nombre_per }} {{ $agenda->apellido_per }}</td>
              <td data-titulo="Cargo">{{ $agenda->cargo_id }}</td>
              <td data-titulo="Telefono"> {{ $agenda->telefono}}
                @if($agenda->colorVeraz == 'Rojo')
              <td data-titulo="Veráz" class="bg-red">
                <span class="bg-red">
                  {{ $agenda->veraz }}
                </span>
              </td>
              @elseif($agenda->colorVeraz == 'Verde')
              <td data-titulo="Veráz">
                <span class="bg-green">
                  {{ $agenda->veraz }}
                </span>
              </td>
              @elseif($agenda->colorVeraz == 'Amarillo')
              <td data-titulo="Veráz">
                <span class="bg-yellow">
                  {{ $agenda->veraz }}
                </span>
              </td>
              @else
              <td data-titulo="Veráz">
                {{ $agenda->veraz }}
              </td>
              @endif
              <td data-titulo="Estado">{{ $agenda->nomEstado }}</td>

              <td data-titulo="Accion">
                @if($agenda->colorAccion == 'Amarillo')
                <span class="bg-yellow">
                  {{ $agenda->accion }}
                </span>
                @endif

                @if($agenda->colorAccion == 'Naranja')
                <span class="bg-orange">
                  {{ $agenda->accion }}
                </span>
                @endif

                @if($agenda->colorAccion == '')
                <span class="bg-sin">
                  {{ $agenda->accion }}
                </span>
                @endif
              </td>

              <td data-titulo="Temas">{{ $agenda->temas }}</td>
              <td>
                <form method="POST" action="{{ route('distribucion_agenda.destroy', $agenda->id) }}" class="ocultar">
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
          </table>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
