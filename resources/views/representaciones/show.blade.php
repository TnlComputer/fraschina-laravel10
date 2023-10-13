<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
      {{ __('Representación') }} {{ $represento->id }}
    </h2>
  </x-slot>
  <div class="py-4 max-w-full mx-auto sm:px-6 lg:px-8">
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
            <td class="w-1/12">{{ $represento->razonsocial }}</td>
            <td class="w-2/12">{{ $represento->dire_calle }} {{ $represento->dire_nro }}
              {{ $represento->piso }} {{ $represento->dpto }}</td>
            <td class="w-1/12">{{ $represento->codpost }}</td>
            <td class="w-1/12">{{ $represento->telefono }}</td>
            <td class="w-1/12">{{ $represento->barrio }}</td>
            <td class="w-1/12">{{ $represento->localidad }}</td>
            <td class="w-1/12">{{ $represento->municipio }}</td>
            <td class="w-1/12">{{ $represento->zona }}</td>
            <td class="w-1/12">{{ $represento->cuit }}</td>
            <td class="w-1/12">{{ $represento->correo }}</td>
            <td class="w-1/12">{{ $represento->marcas }}</td>
          </tr>
        </table>

        <article class="py-2 text-gray-900 text-sm">
          <label class=" text-lg">Información</label>
          <p class="p-2 bg-slate-300">{{ $represento->info }}</p>
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
        <a href="{{ route('representacion_producto.create') }}" class=" align-middle text-left">
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
        @forelse($representaciones_personal as $rp)
        <tr class="text-gray-900 text-xs align-text-top ">
          <td>
            <a href="{{ route('representacion_personal.edit', $rp->id) }}">
              <i class="fa-regular fa-pen-to-square fa-sm" style="color: #0059ff;"></i>
            </a>
          </td>
          <td></td>
          <td class="w-1/12 text-left"> {{ $rp->nombre }} {{ $rp->apellido }}</td>
          <td>
            @if($rp->fuera === 1)
            <i class="fas fa-circle fa-xs" style="color: #ff0000;"></i>
            @else
            <i class="fas fa-circle fa-xs" style="color: #00ff33;"></i>
            @endif
          </td>
          <td class="w-1/12">{{ $rp->teldirecto }}</td>
          <td class="w-1/12">{{ $rp->interno }}</td>
          <td class="w-1/12">{{ $rp->telcelular }}</td>
          <td class="w-1/12">{{ $rp->telparticular }}</td>
          <td class="w-1/12">{{ $rp->email }}</td>
          <td class="w-1/12">{{ $rp->profesion }}</td>
          <td class="w-1/12">{{ $rp->area }}</td>
          <td class="w-1/12">{{ $rp->cargo }}</td>
          <td class="w-2/12">{{ $rp->marcas }}</td>

          <td>
            <form method="POST" action="{{ route('representacion_personal.destroy', $rp->id) }}">
              @csrf
              @method(' DELETE')
              <button type="submit"><i class='fa-solid fa-trash fa-sm' style="color: #ff0000;"></i> </button>
            </form>
          </td>
        </tr>
        @empty
        <p>No hay registros para mostrar...</p>
        @endforelse
        {{ $representaciones_personal->links() }}
      </table>
    </div>
  </div>
  </div>

  <div class="py-4 mx-auto sm:px-6 lg:px-8">
    <div class=" bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">
      <div class=" w-2/12 p-2 text-gray-900  text-sm float-left">
        <a href="{{ route('representacion_producto.create') }}" class=" align-middle text-left">
          <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nuevo Producto</button>
        </a>
      </div>
      <div class=" w-10/12 p-2 text-gray-900  text-sm float">
        <h3 class="text-2xl text-center">Especificaciones</h3>
      </div>
      <div class="p-2 text-gray-900  text-sm text-center">
        <table>
          <tr class=" bg-black text-white">
            <th></th>
            <th colspan="4">Alveográficas</th>
            <th colspan="5">Físico Químico</th>
            <th colspan="5">Farinográfina</th>
            <th></th>
          </tr>
          <tr>
            <th></th>
            <th class="w-1/12  text-left ">Producto</th>
            <th class="w-1/12">PL</th>
            <th class=" w-1/12">P</th>
            <th class="w-1/12">L</th>
            <th class="w-1/12">W</th>
            <th class="w-1/12">Gluten Humedo</th>
            <th class="w-1/12">Gluten Seco</th>
            <th class="w-1/12">Cenizas</th>
            <th class="w-1/12">FN</th>
            <th class="w-1/12">Humedad</th>
            <th class="w-1/12">Estabilidad</th>
            <th class="w-1/12">Absorción</th>
            <th class="w-1/12">Puntuaciones</th>
            <th class="w-1/12 text-left">Particularidades</th>
            <th></th>
          </tr>

          @forelse($productos as $p)
          <tr class="text-gray-900 text-xs  align-text-top">

            <td>
              <a href="{{ route('representacion_producto.edit', $p->id) }}">
                <i class="fa-regular fa-pen-to-square fa-sm" style="color: #0059ff;"></i>
              </a>
            </td>


            <td class=" w-0.5 text-left"> {{ $p->producto }}</td>
            <td class="w-0.5"> {{ $p->pl }}</td>
            <td class="w-0.5">{{ $p->p }}</td>
            <td class="w-0.5">{{ $p->l }}</td>
            <td class="w-0.5">{{ $p->w }}</td>
            <td class="w-0.5">{{ $p->glutenhumedo }}</td>
            <td class="w-0.5">{{ $p->glutenseco }}</td>
            <td class="w-0.5">{{ $p->cenizas }}</td>
            <td class="w-0.5">{{ $p->fn }}</td>
            <td class="w-0.5">{{ $p->humedad }}</td>
            <td class="w-0.5">{{ $p->estabilidad }}</td>
            <td class="w-0.5">{{ $p->absorcion }}</td>
            <td class=" ww-1/12">{{ $p->puntuaciones }}</td>
            <td class="w-1/12  text-left">{{ $p->particularidades }}</td>
            <td>
              <form method="POST" action="{{ route('representacion_producto.destroy', $p->id) }}">
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
