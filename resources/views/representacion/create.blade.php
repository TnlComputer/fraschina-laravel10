<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Representacion') }} Nuevo
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('representacion.store') }}" method="post" class="card__form" enctype="multipart/form-data">
              @csrf
              <div class="card__div">
                <label class="card__label" for="razonsocial">Razón social</label>
                <input class="card__input" type="text" name="name" id="name" value="" placeholder="" required>
                <input type="hidden" name="id">
              </div>

              <div class="card__div">
                <label class="card__label" for="dire_calle">Dirección</label>
                <input class="card__input" type="text" name="dire_calle" id="dire_calle" value="" placeholder="" required>
              </div>

              <div class="card__div">
                <label class="card__label" for="dire_nro">Altura</label>
                <input class="card__input" type="number" name="dire_nro" id="dire_nro" value="" placeholder="" required>
              </div>

              <div class="card__div">
                <label class="card__label" for="piso">Piso</label>
                <input class="card__input" type="text" name="piso" id="piso" value="">
              </div>

              <div class="card__div">
                <label class="card__label" for="dpto">Dpto</label>
                <input class="card__input" type="text" name="dpto" id="dpto" value="">
              </div>

              <div class="card__div">
                <label class="card__label" for="codpost">Cod.Post</label>
                <input class="card__input" type="text" name="codpost" id="codpost" value="">
              </div>

              <div class="card__div">
                <label class="card__label" for="telefono">Telefono</label>
                <input class="card__input" type="text" name="telefono" id="telefono" value="">
              </div>

              <div class="card__div">
                <label class="card__label" for="barrio_id">Barrio</label>
                <select name="barrio_id" id="barrio_id" class="card__input">
                  <option value="144">Seleccione un barrio</option>
                  @foreach ($barrios as $barrio)
                  <option value="{{ $barrio->id }}">{{ $barrio->nombrebarrio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="localidad_id">Localidad</label>
                <select name="localidad_id" id="localidad_id" class="card__input">
                  <option value="111">Seleccione una localidad</option>
                  @foreach ($localidades as $localidad)
                  <option value="{{ $localidad->id }}">{{ $localidad->localidad  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="municipio_id">Municipio</label>
                <select name="municipio_id" id="municipio_id" class="card__input">
                  <option value="23">Seleccione una ciudad o municipio</option>
                  @foreach ($municipios as $municipio)
                  <option value="{{ $municipio->id }}">{{ $municipio->ciudadmunicipio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="zona_id">Zona</label>
                <select name="zona_id" id="zona_id" class="card__input" required>
                  <option value="6">Seleccione una zona</option>
                  @foreach ($zonas as $zona)
                  <option value="{{ $zona->id }}">{{ $zona->nombre  }}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="card__div">

                <label class="card__label" for="cuit">Cuit</label>
                <input class="card__input" type="text" name="cuit" id="cuit" value="">
              </div>

              <div class="card__div">
                <label class="card__label" for="correo">Email</label>
                <input class="card__input" type="email" name="correo" id="correo" value="">
              </div>

              <div class="card__div">
                <label class="card__label" for="marcas">Marcas</label>
                <input class="card__input" type="text" name="marcas" id="marcas" value="">
              </div>

              <div class="card__div">
                <label class="card__label" for="info">Información</label>
                <textarea class="card__input" name="info" id="info" cols="60" rows="10"></textarea>
              </div>

              <div class="personal__btn">
                <div class="btn__aceptar">
                  <input class="btn__aceptar" type="submit" value="Aceptar">
                </div>

                <div class="btn__reset">
                  <input class="btn__reset" type="reset" value="Restaurar">
                </div>

                <div class="btn__cancelar">
                  <form action="{{ URL::route('representacion.index') }}">
                    <input class=" btn__aceptar" type="submit" value="Cancelar">
                  </form>
                </div>
                {{-- </div> --}}
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
