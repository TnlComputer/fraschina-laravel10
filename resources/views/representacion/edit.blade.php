<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Representacion') }} Edit
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('representacion.update', $represento) }}" method="post" class="representacion__form">
              @csrf
              @method('put')
              <div class="representacion__div">
                <label class="representacion__label" for="razonsocial">Razón social</label>
                <input class="representacion__input" type="text" value="{{ $represento->razonsocial }}" placeholder="" required>
                <input type="hidden" name="id" value="{{ $represento->id }}">
              </div>

              <div class=" representacion__div">
                <label class="representacion__label" for="dire_calle">Dirección</label>
                <input class="representacion__input" type="text" name="dire_calle" id="dire_calle" value="{{ $represento->dire_calle }}" placeholder="" required>
              </div>

              <div class="representacion__div">
                <label class="representacion__label" for="dire_nro">Altura</label>
                <input class="representacion__input" type="number" name="dire_nro" id="dire_nro" value="{{ $represento->dire_nro }}" placeholder="" required>
              </div>

              <div class="representacion__div">
                <label class="representacion__label" for="piso">Piso</label>
                <input class="representacion__input" type="text" name="piso" id="piso" value="{{ $represento->piso }}">
              </div>
              <div class="representacion__div">

                <label class="representacion__label" for="dpto">Dpto</label>
                <input class="representacion__input" type="text" name="dpto" id="dpto" value="{{ $represento->dpto }}">
              </div>
              <div class="representacion__div">

                <label class="representacion__label" for="codpost">Cod.Post</label>
                <input class="representacion__input" type="text" name="codpost" id="codpost" value="{{ $represento->codpost }}">
              </div>
              <div class="representacion__div">

                <label class="representacion__label" for="telefono">Telefono</label>
                <input class="representacion__input" type="text" name="telefono" id="telefono" value="{{ $represento->telefono }}">
              </div>
              <div class="representacion__div">

                <label class="representacion__label" for="barrio_id">Barrio</label>
                <select name="barrio_id" id="barrio_id" class="representacion__input">
                  @foreach ($barrios as $barrio)
                  <option value="{{ $barrio->id }}" {{ $represento->barrio_id == $barrio->id ? 'selected' : '' }}>{{ $barrio->nombrebarrio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="representacion__div">
                <label class="representacion__label" for="localidad_id">Localidad</label>
                <select name="localidad_id" id="localidad_id" class="representacion__input">
                  @foreach ($localidades as $localidad)
                  <option value="{{ $localidad->id }}" {{ $represento->localidad_id == $localidad->id ? 'selected' : '' }}>{{ $localidad->localidad  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="representacion__div">

                <label class="representacion__label" for="municipio_id">Municipio</label>
                <select name="municipio_id" id="municipio_id" class="representacion__input">
                  @foreach ($municipios as $municipio)
                  <option value="{{ $municipio->id }}" {{ $represento->municipio_id == $municipio->id ? 'selected' : '' }}>{{ $municipio->ciudadmunicipio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="representacion__div">
                <label class="representacion__label" for="zona_id">Zona</label>
                <select name="zona_id" id="zona_id" class="representacion__input">
                  @foreach ($zonas as $zona)
                  <option value="{{ $zona->id }}" {{ $represento->zona_id == $zona->id ? 'selected' : '' }}>{{ $zona->nombre  }}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="representacion__div">

                <label class="representacion__label" for="cuit">Cuit</label>
                <input class="representacion__input" type="text" name="cuit" id="cuit" value="{{ $represento->cuit }}">
              </div>
              <div class="representacion__div">

                <label class="representacion__label" for="correo">Email</label>
                <input class="representacion__input" type="email" name="correo" id="correo" value="{{ $represento->correo }}">
              </div>
              <div class="representacion__div">

                <label class="representacion__label" for="marcas">Marcas</label>
                <input class="representacion__input" type="text" name="marcas" id="marcas" value="{{ $represento->marcas }}">
              </div>
              <div class="representacion__div">

                <label class="representacion__label" for="info">Información</label>
                <textarea class="representacion__input" name="info" id="info" cols="60" rows="6">"{{ $represento->info }}"></textarea>
              </div>

              <div class="personal_btn">
                <input type="submit" class="btn__aceptar" value="Aceptar">
                <a href="{{ URL::route('representacion.index'); }}" class="btn__cancelar">Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
