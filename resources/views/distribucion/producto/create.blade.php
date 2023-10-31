<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Nuevo Producto Distribución') }} - {{ $distribucion->id }}

    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class="sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('distribucion_producto.store') }}" method="POST" class="personal__form">
              @csrf
              <div class="personal__div">
                <label class="personal__label" for="producto_id">Producto</label>
                <select name="producto_id" id="producto_id" class="personal__input">
                  <option value="">Seleccione una opcion</option>
                  @foreach ($disProd as $disprod)
                  <option value="{{ $disprod->id }}">{{ $disprod->productoCDA  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="precio">Precio</label>
                <input class="personal__input" type="number" name="precio" id="precio" step="0.1" value="" placeholder="Ingrese el precio">

                <input type="hidden" name="distribucion_id" id="distribucion_id" value="{{ $distribucion->id }}">

                <input type="hidden" name="status" id="status" value="A">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="fecha">Fecha</label>
                <input class="personal__input" type="date" name="fecha" id="fecha" value="" placeholder="Ingrese la fecha" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="fechaUEnt"> Fecha Ult Entrega</label>
                <input class="personal__input" type="date" name="fechaUEnt" id="fechaUEnt" value="" placeholder="Ingrese la fecha de última entrega" />

              </div>
              <div class="personal__btn">
                <div class="btn__aceptar">
                  <input class="" type="submit" value="Aceptar">
                </div>

                <div class="btn__reset">
                  <input class="" type="reset" value="Restaurar">
                </div>

                <div class="btn__cancelar">
                  <a class="btn__acancelar" href="{{ route('distribucion.show', ['distribucion' => $distribucion->id]) }}">Cancelar</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
