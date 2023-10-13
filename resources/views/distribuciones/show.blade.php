<x-app-layout>
  {{-- <x-slot name="header">
  </x-slot> --}}
  <h2 class="px-8 py-1 font-semibold text-xl text-gray-900 leading-tight">
    {{ __('Distribución') }} {{ $distribucion->id }}
  </h2>
  <div class="py-2 max-w-full mx-auto sm:px-6 lg:px-8">
    <div class="bg-slate-200 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-2 text-white rounded-sm text-sm text-left">
        <table>
          <tr class=" bg-zinc-600">
            <th class="w-1/12">Razón social</th>
            <th class="w-1/12">Dirección</th>
            <th class="w-1/12">Cod.Post</th>
            <th class="w-2/12">Teléfono</th>
            <th class="w-1/12">Barrio</th>
            <th class="w-1/12">Localidad</th>
            <th class="w-1/12">Municipio</th>
            <th class="w-1/12">Zona</th>
            <th class="w-1/12">Cuit</th>
            <th class="w-2/12">Email</th>
            <th class="w-1/12">Marcas</th>
          </tr>
          <tr class="p-6 text-gray-900 text-md text-xs">
            <td class="w-1/12">{{ $distribucion->razonsocial }}</td>
            <td class="w-2/12">{{ $distribucion->dire_calle }} {{ $distribucion->dire_nro }}
              {{ $distribucion->piso }} {{ $distribucion->dpto }}</td>
            <td class="w-1/12">{{ $distribucion->codpost }}</td>
            <td class="w-1/12">{{ $distribucion->telefono }}</td>
            <td class="w-1/12">{{ $distribucion->barrio }}</td>
            <td class="w-1/12">{{ $distribucion->localidad }}</td>
            <td class="w-1/12">{{ $distribucion->municipio }}</td>
            <td class="w-1/12">{{ $distribucion->zona }}</td>
            <td class="w-1/12">{{ $distribucion->cuit }}</td>
            <td class="w-1/12">{{ $distribucion->correo }}</td>
            <td class="w-1/12">{{ $distribucion->marcas }}</td>
          </tr>
        </table>

        <article class="py-2 text-gray-900 text-sm">
          <label class=" text-lg">Información</label>
          <p class="p-2 bg-slate-300">{{ $distribucion->info }}</p>

        </article>
        {{-- <span class=" text-gray-900 text-sm">
          <label class="">Comentarios</label>
          <p class="">
            @forelse($comentarios as $coment)
            {{ $coment->fecha }}
        {{ $coment->comentario }}
        <br>
        @empty
        <p>Sin comentarios</p>
        @endforelse
        </p>
        </span> --}}
      </div>
    </div>
  </div>


  <div class=" mx-auto sm:px-6 lg:px-8">
    <div class=" bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">
      {{-- <div class="p-4 text-gray-900  text-sm text-left"> --}}
      <div class=" w-2/12 p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('distribucion_producto.create') }}" class=" align-middle text-left">
          <button class="p-2 bg-gray-800 text-white sm:rounded-lg" type="button">Nuevo Contacto</button></a>

      </div>
      <div class=" w-10/12 p-2 text-gray-900  text-sm float">
        <h3 class="text-2xl text-center">Contactos</h3>
      </div>
      <div class="p-2 text-gray-900  text-sm text-left ">



        {{-- <div class="p-2 text-gray-950">
            <a href="{{ route('representacion_personal.create') }}">
        <button class="btn btn-group-lg btn-success" type="button">+ Nuevo</button></a>

      </div> --}}
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
