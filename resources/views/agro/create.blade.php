<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl  leading-tight">
      {{ __('Nuevo Agro') }}
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class=" overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2  text-left ">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('agro.store') }}" method="post" class="card__form" enctype="multipart/form-data">
              @csrf
              <div class="card__div">
                <label class="card__label" for="razonsocial">Razón social</label>
                <input class="card__input" type="text" name="razonsocial" id="razonsocial" value="" placeholder="Ingrese la razón social">

                <input type="hidden" name="status" id="status" value="A">
              </div>

              <div class="card__div">
                <label class="card__label" for="dire_calle">Dirección</label>
                <input class="card__input" type="text" name="dire_calle" id="dire_calle" value="" placeholder="Ingrese la dirección">
              </div>

              <div class="card__div">
                <label class="card__label" for="dire_nro">Altura</label>
                <input class="card__input" type="number" name="dire_nro" id="dire_nro" value="" placeholder="Ingrese la altura ">
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
                <label class="card__label" for="barrio_id">Barrio</label>
                <select name="barrio_id" id="single-select-field" class="form-select card__input" required data-placeholder="Seleccione una Zona">
                  <option></option>

                  @foreach ($barrios as $barrio)
                  <option value="{{ $barrio->id }}">{{ $barrio->nombrebarrio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="localidad_id">Localidad</label>
                <select name="localidad_id" id="single-select-field-1" class="form-select card__input" required data-placeholder="Seleccione una Zona">
                  <option></option>

                  @foreach ($localidades as $localidad)
                  <option value="{{ $localidad->id }}">{{ $localidad->localidad  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="municipio_id">Municipio</label>
                <select name="municipio_id" id="single-select-field-2" class="form-select card__input" required data-placeholder="Seleccione una Zona">
                  <option></option>

                  @foreach ($municipios as $municipio)
                  <option value="{{ $municipio->id }}">{{ $municipio->ciudadmunicipio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="telefono">Telefono</label>
                <input class="card__input" type="text" name="telefono" id="telefono" value="">
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
                <textarea class="card__input" name="info" id="info" cols="60" rows="5"></textarea>
              </div>

              <div class="personal__btn">
                <div class="btn__aceptar">
                  <input class="" type="submit" value="Aceptar">
                </div>

                <div class="btn__reset">
                  <input class="" type="reset" value="Restaurar">
                </div>

                <div class="btn__cancelar">
                  <a class="btn__acancelar" href="{{ route('agro.index') }}">Cancelar</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
