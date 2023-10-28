<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
      {{ __('Representación') }} {{ $represento->id }}
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
              <th>Teléfono</th>
              <th>Barrio</th>
              <th>Localidad</th>
              <th>Municipio</th>
              <th>Zona</th>
              <th>Cuit</th>
              <th>Email</th>
              <th>Marcas</th>
            </tr>
          </thead>
          <tr class="p-6 text-gray-900 text-md text-xs">
            <td data-titulo="Razón social">{{ $represento->razonsocial }}</td>

            <td data-titulo="Dirección">{{ $represento->dire_calle }}
              {{ $represento->dire_nro }}
              @if($represento->piso != '')
              {{ $represento->piso }}
              @endif
              @if($represento->dpto != '')
              Piso {{ $represento->dpto }}
              @endif
              @if($represento->codpost != '')
              - ({{ $represento->codpost }})
              @endif
            </td>
            <td data-titulo="Teléfono">{{ $represento->telefono }}</td>
            <td data-titulo="Barrio">{{ $represento->barrio }}</td>
            <td data-titulo="Localidad">{{ $represento->localidad }}</td>
            <td data-titulo="Municipio">{{ $represento->municipio }}</td>
            <td data-titulo="Zona">{{ $represento->zona }}</td>
            <td data-titulo="Cuit">{{ $represento->cuit }}</td>
            <td class="" data-titulo="Email">{{ $represento->correo }}</td>
            <td data-titulo="Marcas">{{ $represento->marcas }}</td>
          </tr>
        </table>
        <article class="py-2 text-gray-900 text-sm">
          <label class=" text-lg">Información</label>
          <p class="p-2 bg-slate-300">{{ $represento->info }}</p>
        </article>
      </div>
    </div>
  </div>
  <div class=" mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('representacion_personal.show', $represento->id) }}" class=" align-middle text-left">
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
              <th>Información</th>
              <td></td>
            </tr>
          </thead>
          @forelse($representaciones_personales as $rp)
          <tr class=" text-gray-900 text-xs align-text-top ">
            <td class="ocultar">
              <a href="{{ route('representacion_personal.edit', $rp->id) }}">
                <i class="fa-regular fa-pen-to-square fa-sm icon-edit"></i>

              </a>
            </td>
            <td>
              @if($rp->fuera === 1)
              <i class="fas fa-circle icon-fuera"></i>
              @else
              <i class="fas fa-circle icon-fuera1"></i>


              @endif
            </td>
            <td data-titulo="Nombre y Apellido"> {{ $rp->nombre }} {{ $rp->apellido }}</td>
            <td data-titulo="Directo">{{ $rp->teldirecto }}</td>
            <td data-titulo="Interno">{{ $rp->interno }}</td>
            <td data-titulo="Celular">{{ $rp->telcelular }}</td>
            <td data-titulo="Particular">{{ $rp->telparticular }}</td>
            <td data-titulo="Email">{{ $rp->email }}</td>
            <td data-titulo="Profesión">{{ $rp->profesion }}</td>
            <td data-titulo="Area">{{ $rp->area }}</td>
            <td data-titulo="Cargo">{{ $rp->cargo }}</td>
            <td data-titulo="Obsercaciones">{{ $rp->observaciones }}</td>
            <td class="ocultar">
              <form method="POST" action="{{ route('representacion_personal.destroy', $rp->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class='fa-solid fa-trash icon-delete'></i> </button>
              </form>
            </td>
          </tr>
          @empty
          <p>No hay registros para mostrar...</p>
          @endforelse
          {{ $representaciones_personales->links() }}
        </table>
      </div>
    </div>
  </div>

  <div class="py-4 mx-auto sm:px-6 lg:px-8">
    <div class=" overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('representacion_producto.show', $represento->id) }}" class=" align-middle text-left">
          <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nuevo Producto</button>
        </a>
      </div>
      <div class="p-2 text-gray-900  text-sm float">
        <h3 class="text-2xl text-center">Especificaciones</h3>
      </div>
      <div>
        <table>
          <thead>
            <tr class="bg-black text-white">
              <th colspan="2"></th>
              <th colspan="4">Alveográficas</th>
              <th colspan="5">Físico Químico</th>
              <th colspan="4">Farinográfina</th>
              <th></th>
            </tr>
          </thead>
          <thead>
            <tr class="text-xs">
              <th></th>
              <th class="text-left ">Producto</th>
              <th class="">PL</th>
              <th class="">P</th>
              <th class="">L</th>
              <th class="">W</th>
              <th class="">Gluten Humedo</th>
              <th class="">Gluten Seco</th>
              <th class="">Cenizas</th>
              <th class="">FN</th>
              <th class="">Humedad</th>
              <th class="">Estabilidad</th>
              <th class="">Absorción</th>
              <th class="">Puntuaciones</th>
              <th class=" text-left">Particularidades</th>
              <th></th>
            </tr>
          </thead>
          @forelse($productos as $p)
          <tr class="text-gray-900 text-xs  align-text-top">
            <td>
              <a href="{{ route('representacion_producto.edit', $p->id) }}">
                <i class="fa-regular fa-pen-to-square icon-edit"></i>
              </a>
            </td>
            <td class=" text-left" data-titulo="Producto"> {{ $p->producto }}</td>
            <td class="" data-titulo="PL"> {{ $p->pl }}</td>
            <td class="" data-titulo="P">{{ $p->p }}</td>
            <td class="" data-titulo="L">{{ $p->l }}</td>
            <td class="" data-titulo="W">{{ $p->w }}</td>
            <td class="" data-titulo="Gluten Húmedo">{{ $p->glutenhumedo }}</td>
            <td class="" data-titulo="Gluten Seco">{{ $p->glutenseco }}</td>
            <td class="" data-titulo="Cenizas">{{ $p->cenizas }}</td>
            <td class="" data-titulo="FN">{{ $p->fn }}</td>
            <td class="" data-titulo="Humedad">{{ $p->humedad }}</td>
            <td class="" data-titulo="Estabilidad">{{ $p->estabilidad }}</td>
            <td class="" data-titulo="Absorción">{{ $p->absorcion }}</td>
            <td class="" data-titulo="Puntuaciones">{{ $p->puntuaciones }}</td>
            <td class="text-left" data-titulo="Particularidades">{{ $p->particularidades }}</td>
            <td>
              <form method="POST" action="{{ route('representacion_producto.destroy', $p->id) }}">
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
