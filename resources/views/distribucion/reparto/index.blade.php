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
            <div class="div__nuevoFecha">
              <a href="{{ route('reparto', $bFecha) }}" target="_blank" class="btn btn-info w-30">Reparto</a>

            </div>
            <div class="div__nuevoFecha">
              <a href="{{ route('control', $bFecha) }}" target="_blank" class="btn btn-info w-30">Control</a>
            </div>
            <div class="div__nuevoFecha">
              <button id="verOculto" class="btn btn-info w-30" type="submit" value="Ocultar">Ocultar</button>

              <button id="verMuestro" class="d-none btn btn-info w-30" type="submit" value="Mostrar">Mostrar</button>

            </div>
            <div class="div__nuevoFecha">
              <form action="{{  route('distribucion_reparto.index') }}">
                <input type="hidden" name="fecha" value="ayer">
                <button class="btn btn-dark text-amber-900 w-30" type="submit">{{ $bAyer }}</button>
              </form>
            </div>
            <div class="div__nuevoFecha">
              <form action="{{  route('distribucion_reparto.index') }}">
                <input type="hidden" name="fecha" value="hoy">
                <button class="btn btn-dark text-amber-900 w-30" type="submit">{{ $bHoy }}</button>
              </form>
            </div>
            <div class="div__nuevoFecha">
              <form action="{{  route('distribucion_reparto.index') }}">
                <button class="btn btn-dark text-amber-900 w-30" type="submit">{{ $bManana }}</button>
              </form>
            </div>
            <div class="div__buscarFecha">
              <form method="get" action="{{  route('distribucion_reparto.index') }}" class="form__buscar">
                @csrf
                <span class="buscoFecha">
                  <input type="date" placeholder="Type to day" name="bFecha" value="{{ $bFecha }}" class="buscoFechaInput p-0">
                </span>
                <span class="span__btn-buscar">
                  <input type="submit" value="Buscar" class="btn__buscar">
                </span>
              </form>
            </div>
          </div>
          <div class="scroll__reparto">
            {{-- {{ $bFecha }} --}}
            <table class="tabla__reparto">
              <thead>
                <tr class="text-xs">
                  <th>Fecha</th>
                  <th>R</th>
                  <th>F</th>
                  <th>C</th>
                  <th>A</th>
                  <th>Fecha Fac</th>
                  <th>Nro. Fac</th>
                  <th>Imp Fac</th>
                  <th><i class="fa-solid fa-print"></i></th>
                  <th>Chofer</th>
                  <th>Orden</th>
                  <th>Pedido</th>
                  <th>N. Fantasía</th>
                  <th>Razón social</th>
                  <th class="ver">Dirección</th>
                  <th class="ver">Barrio</th>
                  <th class="ver">Municipio</th>
                  <th class="ver">Localidad</th>
                  <th class="ver">Zona</th>
                  <th>Cant</th>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cobrar</th>
                  <th>Forma de Cobro</th>
                  <th>Tipo de Cobro</th>
                  <th>Horario Entrega</th>
                  <th>Lunes Cerrado</th>
                  <th>Sabado Recibe</th>
                  <th>Observaciones Recepción</th>
                  {{-- <th>Comentarios</th> --}}
                </tr>
              </thead>
              {{-- Hoy {{ $today }} --}}
              @forelse($pedidos as $pedido)
              <tr>
                @if ($pedido->linea == 1)
                <td data-titulo="Fecha Entrega">{{ \Carbon\Carbon::parse($pedido->fechaEntrega)->format('d-m-Y') }}
                <td>
                  <a href="{{ route('recibo', $pedido->pedido) }}" target="_blank" class="">
                    <i class="fa-solid fa-print"></i>
                  </a>
                </td>
                <td>
                  {{-- <a href="{{ route('distribucion_reparto.show', $pedido->id) }}" class=""> --}}
                  <i class="fa-regular fa-calendar-days"></i>
                  </a>
                </td>
                <td>
                  {{-- <a href="{{ route('distribucion_reparto.edit', $pedido->id) }}" class="ocultar "> --}}
                  <i class="fa-regular fa-pen-to-square icon-edit"></i>
                  </a>
                </td>
                <td>
                  {{-- <a href="{{ route('distribucion_reparto.show', $pedido->id) }}" class=""> --}}
                  <i class="fa-solid fa-rotate-right"></i>
                  </a>
                </td>
                <td data-titulo="Fecha Factura">
                  <input class="text-right w-28 text-xs p-0 " type="date" name="fechaFactura" id="fechaFactura" value="{{ $pedido->fechaFactura }}">
                </td>
                <td data-titulo="Nro Factura">
                  <input class="text-right w-20 text-xs p-0 " type="number" name="nroFactura" id="nroFactura" value="{{ $pedido->nroFactura }}">
                </td>
                <td data-titulo="Importe Factura">
                  <input class="text-right w-24 text-xs p-0" type="number" name="total_factura" id="total_factura" step="0.01" value="{{ $pedido->total_factura}}">
                </td>
                @if($pedido->imprimo == 'SI')
                <td class="text-center text-xs p-0 w-1" data-titulo="Fac. Impresa" style="background-color: yellow">
                  {{ $pedido->imprimo }}
                </td>
                @else
                <td data-titulo="Fac.Impresa"></td>
                @endif
                <td data-titulo="Chofer">
                  <input class="text-center w-10 text-xs p-0" type="text" name="chofer" id="chofer" value="{{ $pedido->chofer}} ">
                </td>
                <td data-titulo=" Orden">
                  <input class="text-center w-10 text-xs p-0" type="text" name="orden" id="orden" value="{{ $pedido->orden}} ">
                </td>
                <td class="text-xs p-0" data-titulo="Nro Factura">{{ $pedido->nroFactura}} </td>
                <td class="text-xs p-0" data-titulo="Nombre Fantasía">{{ $pedido->nomfantasia}} </td>
                <td class="text-xs p-0" data-titulo="Razón social">{{ $pedido->razonsocial}} </td>
                <td class="text-xs p-0 ver" data-titulo="Dirección"> {{ $pedido->dire_calle }}
                  {{ $pedido->dire_nro }}
                  @if($pedido->piso != '')
                  {{ $pedido->piso }}
                  @endif
                  @if($pedido->dpto != '')
                  Piso {{ $pedido->dpto }}
                  @endif
                </td>
                <td class="ver text-xs p-0" data-titulo="Barrio">{{ $pedido->barrio }}</td>
                <td class="ver text-xs p-0" data-titulo="Localidad">{{ $pedido->localidad }}</td>
                <td class="ver text-xs p-0" data-titulo="Municipio">{{ $pedido->municipio }}</td>
                <td class="ver text-xs p-0" data-titulo="Zona">{{ $pedido->zona }}</td>
                @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="ver"></td>
                <td class="ver"></td>
                <td class="ver"></td>
                <td class="ver"></td>
                <td class="ver"></td>
                @endif
                <td class="text-center text-xs p-0" data-titulo="Cantidad">{{ $pedido->cantidad }}</td>
                <td class="text-xs p-0" data-titulo="Producto">{{ $pedido->nombre_producto }}</td>
                <td class="text-xs p-0" data-titulo="Precio">${{ number_format($pedido->precio_unitario, 2) }} </td>
                <td class="text-center text-xs p-0" data-titulo="Cobrar">{{ $pedido->cobro }}</td>
                <td class="text-center text-xs p-0" data-titulo="Forma Pago">{{ $pedido->cobrar }}</td>
                <td class="text-center text-xs p-0" data-titulo="Tipo de Pago">{{ $pedido->tpago }}</td>
                <td class="text-center text-xs p-0" data-titulo="Horario Entrega">
                  {{date('H:i', strtotime($pedido->desde)) }} -
                  {{date('H:i', strtotime($pedido->hasta)) }} /
                  {{date('H:i', strtotime($pedido->desde1)) }} -
                  {{date('H:i', strtotime($pedido->hasta1)) }}
                </td>
                <td class="text-center text-xs p-0" data-titulo="Zona">{{ $pedido->lunes }}</td>
                <td class="text-center text-xs p-0" data-titulo="Zona">{{ $pedido->sabado }}</td>
                <td class="text-xs" data-titulo="Obs. Recepción">{{ $pedido->obsrecep }}</td>
              </tr>
              @empty
              <td>
                <p>No hay registros para mostrar...</p>
              </td>
              @endforelse
              {{ $pedidos->links() }}
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

<script>
  const ver = document.querySelectorAll(".ver");
  verOculto.addEventListener("click", () => {
    for (let i = 0; i < ver.length; i++) {
      ver[i].classList.toggle('d-none')
    }
    // console.log(verOculto.innerText);
    // if (verOculto.innerText == "Ocultar") {
    //   verOculto.innerHTML('Mostrar')
    // } else {
    //   verOculto.innerText('Ocultar')
    // }
    // VerMuestro.classList.toggle('', 'd-none');
  });

  // function changeText() {
  //   let element = document.querySelector('cambiar');

  //   if (element.value == 'Hide Result')
  //     element.value = 'Show Result';
  //   else
  //     element.value = 'Hide Result';
  // }

</script>
