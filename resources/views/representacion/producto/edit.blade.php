<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Representación Producto') }} Edición
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class="sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('representacion_producto.update', $producto) }}" method="POST" class="personal__form">
              @csrf
              @method('put')

              <div class="personal__div">
                <label class="personal__label" for="producto">Producto</label>
                <select name="producto_id" id="producto_id" class="personal__input">
                  @foreach ($repProd as $reprod)
                  <option value="{{ $reprod->id }}" {{ $producto->producto_id == $reprod->id ? 'selected' : '' }}>{{ $reprod->nombre  }}
                  </option>
                  @endforeach
                </select>


                {{-- <input class="personal__input" type="hidden" name="producto_id" id="producto_id" value="{{ $producto->producto_id }}">
                <input class="personal__input" type="hidden" name="nombreProducto" id="nombreProducto" value="{{ $producto->nombreProducto }}" placeholder="Ingrese el nombre del producto"> --}}
              </div>

              <div class="personal__div">
                <label class="personal__label" for="pl">PL</label>
                <input class="personal__input" type="text" name="pl" id="pl" value="{{ $producto->pl }}" placeholder="Ingrese el PL">
                <input type="hidden" name="representacion_id" id="representacion_id" value="{{ $producto->representacion_id }}">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="p">P</label>
                <input class="personal__input" type="text" name="p" id="p" value="{{ $producto->p }}" placeholder="Ingrese el P" />


                <div class="personal__div">
                  <label class="personal__label" for="l"> L</label>
                  <input class="personal__input" type="text" name="l" id="l" value="{{ $producto->l }}" placeholder="Ingrese el L" />



                </div>
                <div class="personal__div">
                  <label class="personal__label" for="w">W</label>
                  <input class="personal__input" type="text" name="w" id="w" value="{{ $producto->w }}" placeholder="Ingrese el W" />

                </div>

                <div class="personal__div">
                  <label class="personal__label" for="glutenhumedo">Gluten Húmedo</label>
                  <input class="personal__input" type=" text" name="glutenhumedo" id="glutenhumedo" value="{{ $producto->glutenhumedo }}" placeholder="Escriba el Gluten Húmedo" />


                  <div class="personal__div">
                    <label class="personal__label" for="glutenseco">Gluten Seco</label>
                    <input class="personal__input" type=" text" name="glutenseco" id="glutenseco" value="{{ $producto->glutenseco }}" placeholder="Escriba el Gluten Seco" />

                  </div>
                  <div class="personal__div">
                    <label class="personal__label" for="cenizas">Cenizas</label>
                    <input class="personal__input" type="text" name="cenizas" id="cenizas" value="{{ $producto->cenizas }}" placeholder="Escrila el cenizas" />

                  </div>

                </div>
                <div class="personal__div">
                  <label class="personal__label" for="fn">FN</label>
                  <input class="personal__input" type="type" name="fn" id="fn" value="{{ $producto->fn }}" placeholder="Escrila el FN" />


                </div>

              </div>
              <div class="personal__div">
                <label class="personal__label" for="humedad">Humedad</label>
                <input class="personal__input" type="type" name="humedad" id="humedad" value="{{ $producto->humedad }}" placeholder="Escriba la humedad" />

              </div>

          </div>
          <div class="personal__div">
            <label class="personal__label" for="absorcion">Absorción</label>
            <input class="personal__input" type="type" name="absorcion" id="absorcion" value="{{ $producto->absorcion }}" placeholder="Escrila la absorcion" />

          </div>
          <div class="personal__div">
            <label class="personal__label" for="puntuaciones">Puntuaciones</label>
            <input class="personal__input" type="type" name="puntuaciones" id="puntuaciones" value="{{ $producto->puntuaciones }}" placeholder="Escrila las puntuaciones" />
          </div>

          <div class="personal__div">
            <label class="personal__label" for="particularidades">Particularidades</label>
            <textarea name="particularidades" id="particularidades" cols="30" rows="3" class="personal__input">{{ $producto->particularidades }}</textarea>
          </div>


          <div class="personal__btn">
            <div class="btn__aceptar">
              <input class="btn__aceptar" type="submit" value="Aceptar">
            </div>

            <div class="btn__reset">
              <input class="btn__reset" type="reset" value="Restaurar">
            </div>

            <div class="btn__cancelar">
              <form action="{{ URL::route('representacion.show', ['representacion' => $producto->representacion_id]) }}">
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
