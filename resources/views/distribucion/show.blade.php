<x-app-layout>
  {{-- <x-slot name="header">
  </x-slot> --}}
  <h2 class="px-8 py-1 font-semibold text-xl text-gray-900 leading-tight">
    {{ __('Distribución') }} {{ $distribucion->id }}
  </h2>
  <div class="py-2 max-w-full mx-auto sm:px-6 lg:px-8">
    <div class="bg-slate-200 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 ounded-sm text-sm text-left">
        <article class="dist__article">
          <div class="dist__article-col1">
            <label class="dist__title">N. Fantasía</label>
            <p class="dist__p"> {{ $distribucion->nomfantasia }}</p>
          </div>

          <div class="dist__article-col1">
            <label class="dist__title">Razón social</label>
            <p class="dist__p"> {{ $distribucion->razonsocial }}</p>
          </div>

          <div class="dist__article-col1">
            <label class="dist__title">Dirección</label>
            <p class="dist__p"> {{ $distribucion->dire_calle }} {{ $distribucion->dire_nro }} @if($distribucion->piso != '')
              {{ $distribucion->piso }}
              @endif
              @if($distribucion->dpto != '')
              Piso {{ $distribucion->dpto }}
              @endif
              @if($distribucion->codpost != '')
              - ({{ $distribucion->codpost }})
              @endif
            </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Barrio</label>
            <p class="dist__p">{{ $distribucion->barrio }} </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Localidad</label>
            <p class="dist__p">{{ $distribucion->localidad }} </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Municipio</label>
            <p class="dist__p">{{ $distribucion->municipio }} </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Zona</label>
            <p class="dist__p">{{ $distribucion->zona }} </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Teléfono</label>
            <p class="dist__p">{{ $distribucion->telefono }} </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Cuit</label>
            <p class="dist__p">{{ $distribucion->cuit }} </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Email</label>
            <p class="dist__p">{{ $distribucion->correo }} </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Marcas</label>
            <p class="dist__p">{{ $distribucion->marcas }} </p>
          </div>
          <div class="dist__article-col1">
            <label class="dist__title">Contacto Inicial</label>
            <p class="dist__p">{{ $distribucion->contacto }} </p>
          </div>

          <div class="dist__article-col2">
            <label class="dist__title">Automatizado</label>
            <p class="dist__p">{{ $distribucion->auto }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Veráz</label>
            <p class="dist__p">{{ $distribucion->veraz }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Estado</label>
            <p class="dist__p">{{ $distribucion->estado }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Recibe Desde</label>
            <p class="dist__p">{{ $distribucion->desde }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Recibe hasta</label>
            <p class="dist__p">{{ $distribucion->hasta }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Recibe Desde</label>
            <p class="dist__p">{{ $distribucion->desde1 }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Recibe hasta</label>
            <p class="dist__p">{{ $distribucion->hasta1 }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Productos</label>
            <p class="dist__p">{{ $distribucion->productoCDA }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Lunes Cerrado</label>
            <p class="dist__p">{{ $distribucion->lunes }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Sabado Recibe</label>
            <p class="dist__p">{{ $distribucion->sabado }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Factura Impresa</label>
            <p class="dist__p">{{ $distribucion->fac_imp }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Obs. Recepción</label>
            <p class="dist__p">{{ $distribucion->obsrecep }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Cobrar</label>
            <p class="dist__p">{{ $distribucion->cobrar }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Cond. de Pago</label>
            <p class="dist__p">{{ $distribucion->condpago }} </p>
          </div>
          <div class="dist__article-col2">
            <label class="dist__title">Forma de Pago</label>
            <p class="dist__p">{{ $distribucion->tipopago }} </p>
          </div>
        </article>

        <article class="dist__article-info">
          <label class=" dist__label">Información</label>
          <p class="dist__info">{{ $distribucion->info }}</p>

        </article>
      </div>
    </div>
  </div>

  <div class=" mx-auto sm:px-6 lg:px-8">
    <div class="bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('distribucion_personal.show', $distribucion->id) }}" class=" align-middle text-left">
          <button class="p-2 bg-gray-800 text-white sm:rounded-lg" type="button">Nuevo</button></a>
      </div>
      {{-- </div> --}}
      <div class=" p-2 text-gray-900  text-sm float">
        <h3 class="text-2xl text-center">Contactos</h3>
      </div>
      <div class="p-2 text-gray-900  text-sm text-left ">
        <table>
          <thead>
            <tr>
              <td></td>
              <td></td>
              <th>Nombre y Apellido</th>
              <th>Tel Directo</th>
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

          @forelse($personal as $distPer)
          <tr class="text-gray-900 text-xs align-text-top ">
            <td>
              <a href="{{ route('distribucion_personal.edit', $distPer->id) }}">
                <i class="fa-regular fa-pen-to-square icon-edit"></i>
              </a>
            </td>
            <td>
              @if($distPer->fuera === 1)
              <i class="fas fa-circle fa-xs icon-fuera1"></i>
              @else
              <i class="fas fa-circle fa-xs icon-fuera"></i>
              @endif
            </td>
            <td data-titulo="Nombre Apellido"> {{ $distPer->nombre }} {{ $distPer->apellido }}</td>
            <td data-titulo="Directo">{{ $distPer->teldirecto }}</td>
            <td data-titulo="Interno">{{ $distPer->interno }}</td>
            <td data-titulo="Celular">{{ $distPer->telcelular }}</td>
            <td data-titulo="Particular">{{ $distPer->telparticular }}</td>
            <td data-titulo="Email">{{ $distPer->email }}</td>
            <td data-titulo="Profesión">{{ $distPer->profesion }}</td>
            <td data-titulo="Area">{{ $distPer->area }}</td>
            <td data-titulo="Cargo">{{ $distPer->cargo }}</td>
            <td data-titulo="Observaciones">{{ $distPer->observaciones }}</td>

            <td>
              <form method="POST" action="{{ route('distribucion_personal.destroy', $distPer->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class="fa-solid fa-trash icon-delete"></i> </button>
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
    <div class="bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="ocultar p-2 text-gray-900  text-sm">
        <a href="{{ route('distribucion_producto.show', $distribucion->id) }}" class="align-middle text-left">
          <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nuevo Producto</button>
        </a>
      </div>
      <div class="p-2 text-gray-900  text-sm text-left">
        <table>
          <thead>
            <tr>
              <th></th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Fecha Precio</th>
              <th>Fecha Ult. Entrega</th>
              <th></th>
            </tr>
          </thead>

          @forelse($productos as $p)
          <tr>
            <td>
              <a href="{{ route('distribucion_producto.edit', $p->id) }}">
                <i class="fa-regular fa-pen-to-square icon-edit"></i>
              </a>
            </td>
            <td data-titulo="Producto"> {{ $p->nomproducto }}</td>
            <td data-titulo="Precio">{{ $p->precio }}</td>
            <td data-titulo="Fecha">{{ $p->fecha }}</td>
            <td data-titulo="Fecha Ult. Entrega">{{ $p->fechaUEnt }}</td>
            <td>
              <form method="POST" action="{{ route('distribucion_producto.destroy', $p->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class="fa-solid fa-trash icon-delete"></i> </button>
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
</x-app-layout>
