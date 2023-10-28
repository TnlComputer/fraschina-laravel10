<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Representacion') }} Edit
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-500  text-md">
          <form action="" method="post">
            @csrf
            @method('put')
            <div class="representacion__div">
              <label>Razón social</label>
              <input type="text" value="{{ $represento->razonsocial }}" placeholder="" required>
            </div>

            <div class="representacion__div">
              <label>Dirección</label>
              <input type="text" value="{{ $represento->empresa_institucion }}" placeholder="" required>
            </div>

            <div class="representacion__div">
              <label>Dirección</label>
              <input type="text" value="{{ $represento->profesion }}" placeholder="" required>
            </div>

            <div class="representacion__div">
              <label>Dirección</label>
              <input type="text" value="{{ $represento->dire_calle }}" placeholder="" required>
            </div>

            <div class="representacion__div">
              <label for="">Altura</label>
              <input type="text" value="{{ $represento->dire_nro }}" placeholder="" required>
            </div>

            <div class="representacion__div">
              <label for="">Piso</label>
              <input type="text" value="{{ $represento->piso }}">
            </div>

            <div class="representacion__div">
              <label for="">Dpto</label>
              <input type="text" value="{{ $represento->dpto }}">
            </div>

            <div class="representacion__div">
              <label>Cod.Post</label>
              <input type="text" value="{{ $represento->codpost }}">
            </div>

            <div class="representacion__div">
              <label>Telefono</label>
              <input type="text" value="{{ $represento->telefono }}">
            </div>

            <div class="representacion__div">
              <label>Barrio</label>
              <input type="text" value="{{ $represento->barrio_id }}">
            </div>

            <div class="representacion__div">
              <label>Localidad</label>
              <input type="text" value="{{ $represento->localidad_id }}">
            </div>

            <div class="representacion__div">
              <label>Zona</label>
              <input type="text" value="{{ $represento->zona_id }}">
            </div>

            <div class="representacion__div">
              <label>Cuit</label>
              <input type="text" value="{{ $represento->cuit }}">
            </div>

            <div class="representacion__div">
              <label>Email</label>
              <input type="text" value="{{ $represento->email }}">
            </div>

            <div class="representacion__div">
              <label>Marcas</label>
              <input type="text" value="{{ $represento->marcas }}">
            </div>

            <div class="representacion__div">
              <label>Información</label>
              <textarea name="" id="" cols="60" rows="5">"{{ $represento->info }}"></textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
