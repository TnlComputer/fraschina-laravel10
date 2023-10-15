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
            <label class="dist__title">Teléfono</label>
            <p class="dist__p">{{ $distribucion->telefono }} </p>
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
          {{-- </article>

        <article class="dist__article2"> --}}
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
            <p class="dist__p">{{ $distribucion->productCDA }} </p>
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
    <div class=" bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="ocultar p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('distribucion_producto.create') }}" class=" align-middle text-left">
          <button class="ocultar p-2 bg-gray-800 text-white sm:rounded-lg" type="button">Nuevo Contacto</button></a>
      </div>

      <div class="p-2 text-gray-900  text-sm float">
        <h3 class="dist__titulo">Contactos</h3>
      </div>
      <div class="p-2 text-gray-900  text-sm text-left ">

        <table>
          <tr class=" bg-slate-600 text-white  align-text-top">
            <td></td>
            <td></td>
            <th class="w-2/12">Nombre y Apellido</th>
            <td></td>
            <th class="w-1/12">Tel Directo</th>
            <th class="w-1/12">Int</th>
            <th class="w-1/12">Celular</th>
            <th class="w-1/12">Teléfono</th>
            <th class="w-1/12">Email</th>
            <th class="w-1/12">Profesión</th>
            <th class="w-1/12">Area</th>
            <th class="w-1/12">Cargo</th>
            <th class="w-1/12">Información</th>
            <td></td>
          </tr>
          @forelse($distribuciones_personal as $distPer)
          <tr class="text-gray-900 text-xs align-text-top ">
            <td>
              <a href="{{ route('distribucion_personal.edit', $distPer->id) }}">
                <i class="fa-regular fa-pen-to-square fa-sm" style="color: #0059ff;"></i>
              </a>
            </td>
            <td></td>
            <td class="w-1/12 text-left"> {{ $distPer->nombre }} {{ $distPer->apellido }}</td>
            <td>
              @if($distPer->fuera === 1)
              <i class="fas fa-circle fa-xs" style="color: #ff0000;"></i>
              @else
              <i class="fas fa-circle fa-xs" style="color: #00ff33;"></i>
              @endif
            </td>
            <td class="w-1/12">{{ $distPer->teldirecto }}</td>
            <td class="w-1/12">{{ $distPer->interno }}</td>
            <td class="w-1/12">{{ $distPer->telcelular }}</td>
            <td class="w-1/12">{{ $distPer->telparticular }}</td>
            <td class="w-1/12">{{ $distPer->email }}</td>
            <td class="w-1/12">{{ $distPer->profesion }}</td>
            <td class="w-1/12">{{ $distPer->area }}</td>
            <td class="w-1/12">{{ $distPer->cargo }}</td>
            <td class="w-2/12">{{ $distPer->marcas }}</td>

            <td>
              <form method="POST" action="{{ route('distribucion_personal.destroy', $distPer->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class='fa-solid fa-trash fa-sm' style="color: #ff0000;"></i> </button>
              </form>
            </td>
          </tr>
          @empty
          <p>No hay registros para mostrar...</p>
          @endforelse
          {{ $distribuciones_personal->links() }}
        </table>
      </div>
    </div>
  </div>

  <div class="py-4 mx-auto sm:px-6 lg:px-8">
    <div class="bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-gray-900  text-sm">
        <a href="{{ route('distribucion_producto.create') }}" class="align-middle text-left">
          <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nuevo Producto</button>
        </a>
      </div>
      {{-- <div class=" w-10/12 p-2 text-gray-900  text-sm float">
        <h3 class="text-2xl text-center">Especificaciones</h3>
      </div> --}}
      <div class="p-2 text-gray-900  text-sm text-left">
        <table>
          <tr class=" bg-black text-white">
            {{-- <th></th>
            <th colspan="4">Alveográficas</th>
            <th colspan="5">Físico Químico</th>
            <th colspan="5">Farinográfina</th>
            <th></th>
          </tr>
          <tr> --}}
            <th></th>
            {{-- <th class="w-1/12  text-left ">Producto</th> --}}
            <th class="w-1/12">Producto</th>
            <th class="w-1/12">Precio</th>
            <th class="w-1/12">Fecha Precio</th>
            <th class="w-1/12">Fecha Ult. Entrega</th>
            <th></th>
          </tr>

          @forelse($productos as $p)
          <tr class="text-gray-900 text-xs align-text-top">

            <td>
              <a href="{{ route('distribucion_producto.edit', $p->id) }}">
                <i class="fa-regular fa-pen-to-square fa-sm" style="color: #0059ff;"></i>
              </a>
            </td>
            {{-- <td class=" w-0.5 text-left"> {{ $p->producto }}</td> --}}
            <td class="w-0.5 text-left"> {{ $p->nomproducto }}</td>

            <td class="">{{ $p->precio }}</td>
            <td class="">{{ $p->fecha }}</td>
            <td class="">{{ $p->fechaUEnt }}</td>
            <td>
              <form method="POST" action="{{ route('distribucion_producto.destroy', $p->id) }}">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class='fa-solid fa-trash fa-sm' style="color: #ff0000;"></i> </button>
              </form>
            </td>
          </tr>
          @empty
          <p>No hay Productos...</p>
          @endforelse
          {{-- {{ $productos->links() }} --}}
        </table>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>
