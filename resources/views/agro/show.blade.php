<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
      {{ __('Agro') }} - {{ $agro->id }}
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
            <td data-titulo="Razón social">{{ $agro->razonsocial }}</td>
            <td data-titulo="Dirección">{{ $agro->dire_calle }}
              {{ $agro->dire_nro }}
              @if($agro->piso != '')
              {{ $agro->piso }}
              @endif
              @if($agro->dpto != '')
              Piso {{ $agro->dpto }}
              @endif
              @if($agro->codpost != '')
              - ({{ $agro->codpost }})
              @endif
            </td>
            <td data-titulo="Dir.Observaciones">{{ $agro->dire_obs }}</td>

            <td data-titulo="Teléfono">{{ $agro->telefono }}</td>

            <td data-titulo="Barrio">{{ $agro->barrio }}</td>
            <td data-titulo="Localidad">{{ $agro->localidad }}</td>
            <td data-titulo="Municipio">{{ $agro->municipio }}</td>
            {{-- <td data-titulo="Zona">{{ $agro->zona }}</td> --}}
            <td data-titulo="Cuit">{{ $agro->cuit }}</td>
            <td data-titulo="Email">{{ $agro->correo }}</td>
            <td data-titulo="Marcas">{{ $agro->marcas }}</td>
          </tr>
        </table>
        <article class="py-2 text-gray-900 text-sm">
          <label class=" text-lg">Información</label>
          <p class="p-2 bg-slate-300">{{ $agro->info }}</p>
        </article>
      </div>
    </div>
  </div>
  <div class=" mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('agro_personal.show', $agro->id) }}" class=" align-middle text-left">
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
          @forelse($personal as $p)
          <tr class=" text-gray-900 text-xs align-text-top ">
            <td class="ocultar">
              <a href="{{ route('agro_personal.edit', $p->id) }}">
                <i class="fa-regular fa-pen-to-square fa-sm icon-edit"></i>
              </a>
            </td>
            <td>
              @if($p->fuera === 0)
              <i class="fas fa-circle icon-fuera"></i>
              @else
              <i class="fas fa-circle icon-fuera1"></i>
              @endif
            </td>
            <td data-titulo="Nombre y Apellido"> {{ $p->nombre }} {{ $p->apellido }}</td>
            <td data-titulo="Directo">{{ $p->teldirecto }}</td>
            <td data-titulo="Interno">{{ $p->interno }}</td>
            <td data-titulo="Celular">{{ $p->telcelular }}</td>
            <td data-titulo="Particular">{{ $p->telparticular }}</td>
            <td data-titulo="Email">{{ $p->email }}</td>
            <td data-titulo="Profesión">{{ $p->profesion }}</td>
            <td data-titulo="Area">{{ $p->area }}</td>
            <td data-titulo="Cargo">{{ $p->cargo }}</td>
            <td data-titulo="Información">{{ $p->observaciones }}</td>
            <td class="ocultar">
              <form method="POST" action="{{ route('agro_personal.destroy', $p->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class='fa-solid fa-trash icon-delete'></i> </button>
              </form>
            </td>
          </tr>
          @empty
          <p>No hay registros para mostrar...</p>
          @endforelse
          {{ $personal->links() }}
        </table>
      </div>
    </div>
  </div>

  <div class="py-4 mx-auto sm:px-6 lg:px-8">
    <div class=" overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('agro_producto.show', $agro->id) }}" class=" align-middle text-left">
          <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nuevo Producto</button>
        </a>
      </div>
      <div class="p-2 text-gray-900  text-sm float">
        <h3 class="text-2xl text-center">Productos</h3>
      </div>
      <div>
        <table>
          <thead>
            <tr class="text-xs">
              <th></th>
              <th class="text-left ">Producto</th>
              <th></th>
            </tr>
          </thead>
          @forelse($productos as $p)
          <tr class="text-gray-900 text-xs  align-text-top">
            <td>
              <a href="{{ route('agro_producto.edit', $p->id) }}">
                <i class="fa-regular fa-pen-to-square icon-edit"></i>
              </a>
            </td>
            <td class=" text-left" data-titulo="Producto"> {{ $p->producto }}</td>
            <td>
              <form method="POST" action="{{ route('agro_producto.destroy', $p->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class='fa-solid fa-trash icon-delete'></i> </button>
              </form>
            </td>
          </tr>
          @empty
          <p>No hay Productos...</p>
          @endforelse
        </table>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>
