<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Nuevo Producto') }}
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class="sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('representacion_producto.store') }}" method="POST" class="personal__form">
              @csrf
              {{-- @method('put') --}}

              <div class="personal__div">
                <label class="personal__label" for="producto_id">Producto</label>
                <select name="producto_id" id="producto_id" class="personal__input">
                  <option value="53">Seleccione un producto</option>
                  @foreach ($repProd as $rpr)
                  <option value="{{ $rpr->id }}">{{ $rpr->nombre  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="pl">PL</label>
                <input class="personal__input" type="text" name="pl" id="pl" value="" placeholder="Ingrese el PL" />
                <input type="hidden" name="representacion_id" id="representacion_id" value="{{ $producto }}">
                <input type="hidden" name="status" id="status" value="A">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="p">P</label>
                <input class="personal__input" type="text" name="p" id="p" value="" placeholder="Ingrese el P">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="l">L</label>
                <input class="personal__input" type="text" name="l" id="l" value="" placeholder="Ingrese el L">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="w">W</label>
                <input class="personal__input" type="text" name="w" id="w" value="" placeholder="Ingrese el W">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="glutenhumedo">Gluten Húmedo</label>
                <input class="personal__input" type="text" name="glutenhumedo" id="glutenhumedo" value="" placeholder="Ingrese el Gluten Húmedo">

              </div>

              <div class="personal__div">
                <label class="personal__label" for="glutenseco">Gluten Seco</label>

                <input class="personal__input" type="text" name="glutenseco" id="glutenseco" value="" placeholder="Ingrese el Gluten Seco">

              </div>

              <div class="personal__div">
                <label class="personal__label" for="cenizas">Cenizas</label>
                <input class="personal__input" type="text" name="cenizas" id="cenizas" value="" placeholder="Ingrese las Cenizas">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="fn">fn</label>
                <input class="personal__input" type="text" name="fn" id="fn" value="" placeholder="Ingrese el fn">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="absorcion">Absorción</label>
                <input class="personal__input" type="text" name="absorcion" id="absorcion" value="" placeholder="Ingrese la Absorción">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="puntuaciones">Puntuaciones</label>
                <input class="personal__input" type="text" name="puntuaciones" id="puntuaciones" value="" placeholder="Ingrese las puntuaciones">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="particularidades">Particularidades</label>
                <textarea class="personal__input" cols="60" rows="3" type="text" name="particularidades" id="particularidades" value="" placeholder="Ingrese las Particularidades"></textarea>
              </div>

              <div class="personal__btn">
                <div class="btn__aceptar">
                  <input class="btn__aceptar" type="submit" value="Aceptar">
                </div>

                <div class="btn__reset">
                  <input class="btn__reset" type="reset" value="Restaurar">
                </div>

                <div class="btn__cancelar">
                  <form action="{{ URL::route('representacion.show',  ['representacion' => $producto]) }}">
                    <input class=" btn__aceptar" type="submit" value="Cancelar">
                  </form>
                </div>

              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
