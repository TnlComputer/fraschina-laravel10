<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
      {{ __('Proveedor') }} - {{ $proveedor->id }}
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
            <td data-titulo="Razón social">{{ $proveedor->razonsocial }}</td>
            <td data-titulo="Dirección">{{ $proveedor->dire_calle }}
              {{ $proveedor->dire_nro }}
              @if($proveedor->piso != '')
              {{ $proveedor->piso }}
              @endif
              @if($proveedor->dpto != '')
              Piso {{ $proveedor->dpto }}
              @endif
              @if($proveedor->codpost != '')
              - ({{ $proveedor->codpost }})
              @endif
            </td>
            <td data-titulo="Dir.Observaciones">{{ $proveedor->dire_obs }}</td>

            <td data-titulo="Teléfono">{{ $proveedor->telefono }}</td>

            <td data-titulo="Barrio">{{ $proveedor->barrio }}</td>
            <td data-titulo="Localidad">{{ $proveedor->localidad }}</td>
            <td data-titulo="Municipio">{{ $proveedor->municipio }}</td>
            {{-- <td data-titulo="Zona">{{ $proveedor->zona }}</td> --}}
            <td data-titulo="Cuit">{{ $proveedor->cuit }}</td>
            <td data-titulo="Email">{{ $proveedor->correo }}</td>
            <td data-titulo="Marcas">{{ $proveedor->marcas }}</td>
          </tr>
        </table>
        <article class="py-2 text-gray-900 text-sm">
          <label class=" text-lg">Información</label>
          <p class="p-2 bg-slate-300">{{ $proveedor->info }}</p>
        </article>
      </div>
    </div>
  </div>
  <div class=" mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('proveedor_personal.show', $proveedor->id) }}" class=" align-middle text-left">
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
          @forelse($proveedores_personales as $mp)
          <tr class=" text-gray-900 text-xs align-text-top ">
            <td class="ocultar">
              <a href="{{ route('proveedor_personal.edit', $mp->id) }}">
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
              <form method="POST" action="{{ route('proveedor_personal.destroy', $mp->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class='fa-solid fa-trash icon-delete'></i> </button>
              </form>
            </td>
          </tr>
          @empty
          <p>No hay registros para mostrar...</p>
          @endforelse
          {{ $proveedores_personales->links() }}
        </table>
      </div>
    </div>
  </div>

  <div class="py-4 mx-auto sm:px-6 lg:px-8">
    <div class=" overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('proveedor_producto.show', $proveedor->id) }}" class=" align-middle text-left">
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
              <a href="{{ route('proveedor_producto.edit', $p->id) }}">
                <i class="fa-regular fa-pen-to-square icon-edit"></i>
              </a>
            </td>
            <td class=" text-left" data-titulo="Producto"> {{ $p->producto }}</td>
            <td>
              <form method="POST" action="{{ route('proveedor_producto.destroy', $p->id) }}">
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
