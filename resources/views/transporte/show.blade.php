<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
      {{ __('transporte') }} - {{ $transporte->id }}
    </h2>
  </x-slot>
  <div class="py-4 max-w-full mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-white rounded-sm text-sm text-left">
        <table>
          <thead>
            <tr>
              <th>Razón social</th>
              <th>Dirección</th>
              <th>Dir.Observaciones</th>
              <th>Teléfono</th>
              <th>Barrio</th>
              <th>Localidad</th>
              <th>Municipio</th>
              {{-- <th>Zona</th> --}}
              <th>Cuit</th>
              <th>Email</th>
              <th>Información</th>
            </tr>
          </thead>
          <tr class="p-6 text-gray-900 text-md text-xs">
            <td data-titulo="Razón social">{{ $transporte->razonsocial }}</td>
            <td data-titulo="Dirección">{{ $transporte->dire_calle }}
              {{ $transporte->dire_nro }}
              @if($transporte->piso != '')
              {{ $transporte->piso }}
              @endif
              @if($transporte->dpto != '')
              Piso {{ $transporte->dpto }}
              @endif
              @if($transporte->codpost != '')
              - ({{ $transporte->codpost }})
              @endif
            </td>
            <td data-titulo="Dir.Observaciones">{{ $transporte->dire_obs }}</td>

            <td data-titulo="Teléfono">{{ $transporte->telefono }}</td>

            <td data-titulo="Barrio">{{ $transporte->barrio }}</td>
            <td data-titulo="Localidad">{{ $transporte->localidad }}</td>
            <td data-titulo="Municipio">{{ $transporte->municipio }}</td>
            {{-- <td data-titulo="Zona">{{ $transporte->zona }}</td> --}}
            <td data-titulo="Cuit">{{ $transporte->cuit }}</td>
            <td data-titulo="Email">{{ $transporte->correo }}</td>
            <td data-titulo="Marcas">{{ $transporte->marcas }}</td>
          </tr>
        </table>
        <article class="py-2 text-gray-900 text-sm">
          <label class=" text-lg">Información</label>
          <p class="p-2 bg-slate-300">{{ $transporte->info }}</p>
        </article>
      </div>
    </div>
  </div>
  <div class=" mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('transporte_personal.show', $transporte->id) }}" class=" align-middle text-left">
          <button class="p-2 bg-gray-800 text-white sm:rounded-lg" type="button">Nuevo</button></a>
      </div>
      <div class="p-2 text-gray-900  text-sm float">
        <h3 class="text-2xl text-center">Contactos</h3>
      </div>
      <div class="p-2 text-gray-900  text-sm text-left ">
        <table>
          <thead>
            <tr>
              <td></td>
              <td></td>
              <th>Nombre y Apellido</th>
              <th>Directo</th>
              <th>Int</th>
              <th>Celular</th>
              <th>Teléfono</th>
              <th>Email</th>
              <th>Profesión</th>
              <th>Area</th>
              <th>Cargo</th>
              <th>Observaciones</th>
              <td></td>
            </tr>
          </thead>
          @forelse($transportees_personales as $mp)
          <tr class=" text-gray-900 text-xs align-text-top ">
            <td class="ocultar">
              <a href="{{ route('transporte_personal.edit', $mp->id) }}">
                <i class="fa-regular fa-pen-to-square fa-sm icon-edit"></i>
              </a>
            </td>
            <td>
              @if($mp->fuera === 0)
              <i class="fas fa-circle icon-fuera"></i>
              @else
              <i class="fas fa-circle icon-fuera1"></i>
              @endif
            </td>
            <td data-titulo="Nombre y Apellido"> {{ $mp->nombre }} {{ $mp->apellido }}</td>
            <td data-titulo="Directo">{{ $mp->teldirecto }}</td>
            <td data-titulo="Interno">{{ $mp->interno }}</td>
            <td data-titulo="Celular">{{ $mp->telcelular }}</td>
            <td data-titulo="Particular">{{ $mp->telparticular }}</td>
            <td data-titulo="Email">{{ $mp->email }}</td>
            <td data-titulo="Profesión">{{ $mp->profesion }}</td>
            <td data-titulo="Area">{{ $mp->area }}</td>
            <td data-titulo="Cargo">{{ $mp->cargo }}</td>
            <td data-titulo="Información">{{ $mp->observaciones }}</td>
            <td class="ocultar">
              <form method="POST" action="{{ route('transporte_personal.destroy', $mp->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class='fa-solid fa-trash icon-delete'></i> </button>
              </form>
            </td>
          </tr>
          @empty
          <p>No hay registros para mostrar...</p>
          @endforelse
          {{ $transportees_personales->links() }}
        </table>
      </div>
    </div>
  </div>
</x-app-layout>
