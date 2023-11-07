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
            <div class="div__nuevo-pedido">
              <form action="{{  route('distribucion_agenda.create') }}">
                <input class="btn btn-dark text-amber-900" type="submit" value="Nuevo Pedido">
              </form>
            </div>
            {{-- <div class="div__buscar">
              <form method="get" action="{{  route('distribucion_agenda.index') }}" class="form__buscar">
            @csrf
            <span class="span__input-buscar">
              <input type="text" placeholder="Type to search" name="name" value="{{ old('name') }}" class="input__buscar">
            </span>
            <span class="span__btn-buscar">
              <input type="submit" value="Buscar" class="btn__buscar">
            </span>
            </form>
          </div> --}}
        </div>
        <table>
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th>Pedido</th>
              <th>Fecha</th>
              <th>Entrega</th>
              <th>Cantidad</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Flag</th>
              <th>Retirar</th>
            </tr>
          </thead>

          @forelse($pedidos as $pedido)
          <tr>


            <td>
              {{-- <a href="{{ route('distribucion_agenda.show', $agenda->id) }}" class="">
              <i class="fa-regular fa-eye icon-view"></i>

              </a> --}}
            </td>

            <td>
              {{-- <a href="{{ route('distribucion_agenda.show', $agenda->id) }}" class="">
              <i class="fa-regular fa-eye icon-view"></i>

              </a> --}}
            </td>

            <td>
              {{-- <a href="{{ route('distribucion_agenda.edit', $agenda->id) }}" class="ocultar ">
              <i class="fa-regular fa-pen-to-square icon-edit"></i>

              </a> --}}
            </td>
            <td data-titulo="Pedido">{{ $pedido->pedido }}</td>
            <td data-titulo="Fecha"> {{ $pedido->fecha}}
            <td data-titulo="Entrega"> {{ $pedido->fechaEntrega}}
            <td data-titulo="Cantidad">{{ $pedido->cantidad }}</td>
            <td data-titulo="Precio">{{ $pedido->nombre_producto}}</td>
            <td data-titulo="Precio">{{ $pedido->precio_unitario}}</td>
            <td data-titulo="Flag">{{ $pedido->bandera }} </td>
            <td data-titulo="Retirar">{{ $pedido->retirar }}</td>
          </tr>
          @empty
          <p>No hay registros para mostrar...</p>
          @endforelse
          {{ $pedidos->links() }}
        </table>
      </div>
    </div>
  </div>
  </div>

</x-app-layout>
