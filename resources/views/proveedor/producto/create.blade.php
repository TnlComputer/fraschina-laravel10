<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Nuevo Producto') }} - {{ $proveedor->id }}
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class="sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('proveedor_producto.store') }}" method="POST" class="personal__form">
              @csrf
              <div class="personal__div">
                <label class="personal__label" for="producto_id">Producto</label>
                <select class="form-select" name="producto_id" id="single-select-field" data-placeholder="Seleccione una Producto">
                  <option></option>
                  @foreach ($repProd as $rpr)
                  <option value="{{ $rpr->id }}">{{ $rpr->nombre  }}
                  </option>
                  @endforeach
                </select>

                <input type="hidden" name="proveedor_id" id="proveedor_id" value="{{ $proveedor->id }}">

                <input type="hidden" name="status" id="status" value="A">
              </div>
          </div>


          <div class="personal__btn">
            <div class="btn__aceptar">
              <input class="" type="submit" value="Aceptar">
            </div>

            <div class="btn__reset">
              <input class="" type="reset" value="Restaurar">
            </div>

            <div class="btn__cancelar">
              <a class="btn__acancelar" href="{{ route('proveedor.show',  ['proveedor' => $proveedor->id]) }}">Cancelar</a>

            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
