<div class="modal fade" id="altaModal" tabindex="-1" data-bs-backdrop="static" role="document">
  <div class=" modal-dialog modal-dialog-centered"">
    <div class=" modal-content">
    <div class="modal-header">
      <div class="modal-title fs-5">Alta Cliente Distribución</div>
      <h5 class="modal-title fs-5" aria-labelledby="altaModalLabel"></h5>
      {{-- <button class="btn-close btn-secundary" data-bs-dismiss="modal" aria-label="Close">
      </button> --}}
    </div>
    <form action="{{ route('representacion.update', $represento) }}" method="post" class="card__form">
      @csrf
      @method('put')
      <div class="card__div">
        <label class="card__label" for="razonsocial">Razón social</label>
        <input class="card__input" type="text" name="razonsocial" id="razonsocial" value="{{ $represento->razonsocial }}" placeholder="" required>
        <input type="hidden" name="id" id="id" value="{{ $represento->id }}">
      </div>

      <div class="card__div">
        <label class="card__label" for="dire_calle">Dirección</label>
        <input class="card__input" type="text" name="dire_calle" id="dire_calle" value="{{ $represento->dire_calle }}" placeholder="" required>
      </div>

      <div class="card__div">
        <label class="card__label" for="dire_nro">Altura</label>
        <input class="card__input" type="number" name="dire_nro" id="dire_nro" value="{{ $represento->dire_nro }}" placeholder="" required>
      </div>

      <div class="card__div">
        <label class="card__label" for="piso">Piso</label>
        <input class="card__input" type="text" name="piso" id="piso" value="{{ $represento->piso }}">
      </div>

      <div class="card__div">
        <label class="card__label" for="dpto">Dpto</label>
        <input class="card__input" type="text" name="dpto" id="dpto" value="{{ $represento->dpto }}">
      </div>

      <div class="card__div">
        <label class="card__label" for="codpost">Cod.Post</label>
        <input class="card__input" type="text" name="codpost" id="codpost" value="{{ $represento->codpost }}">
      </div>

      <div class="card__div">
        <label class="card__label" for="telefono">Telefono</label>
        <input class="card__input" type="text" name="telefono" id="telefono" value="{{ $represento->telefono }}">
      </div>

      <div class="card__div">
        <label class="card__label" for="barrio_id">Barrio</label>
        <select class="form-select" name="barrio_id" id="single-select-field" data-placeholder="Seleccione un Barrio">
          <option></option>
          @foreach ($barrios as $barrio)
          <option value="{{ $barrio->id }}" {{ $represento->barrio_id == $barrio->id ? 'selected' : '' }}>{{ $barrio->nombrebarrio  }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="card__div">
        <label class="card__label" for="localidad_id">Localidad</label>
        <select class="form-select card__input" name="localidad_id" id="single-select-field-1" data-placeholder="Seleccione una Localidad">
          <option></option>
          @foreach ($localidades as $localidad)
          <option value="{{ $localidad->id }}" {{ $represento->localidad_id == $localidad->id ? 'selected' : '' }}>{{ $localidad->localidad  }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="card__div">
        <label class="card__label" for="municipio_id">Municipio</label>
        <select class="card__input" name="municipio_id" id="single-select-field-2" data-placeholder="Seleccione una opcion">
          @foreach ($municipios as $municipio)
          <option value="{{ $municipio->id }}" {{ $represento->municipio_id == $municipio->id ? 'selected' : '' }}>{{ $municipio->ciudadmunicipio  }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="card__div">
        <label class="card__label" for="zona_id">Zona</label>
        <select class="form-select" name="zona_id" id="single-select-field-3" data-placeholder="Seleccione una opcion">
          <option></option>
          @foreach ($zonas as $zona) <option value="{{ $zona->id }}" {{ $represento->zona_id == $zona->id ? 'selected' : '' }}>{{ $zona->nombre  }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="card__div">
        <label class="card__label" for="cuit">Cuit</label>
        <input class="card__input" type="text" name="cuit" id="cuit" value="{{ $represento->cuit }}">
      </div>

      <div class="card__div">
        <label class="card__label" for="correo">Email</label>
        <input class="card__input" type="email" name="correo" id="correo" value="{{ $represento->correo }}">
      </div>

      <div class="card__div">
        <label class="card__label" for="marcas">Marcas</label>
        <input class="card__input" type="text" name="marcas" id="marcas" value="{{ $represento->marcas }}">
      </div>

      <div class="card__div">
        <label class="card__label" for="info">Información</label>
        <textarea class="card__input" name="info" id="info" cols="60" rows="10">{{ $represento->info }}</textarea>
      </div>

      <div class="personal__btn">
        <div class="btn__aceptar">
          <input class="" type="submit" value="Aceptar">
        </div>

        <div class="btn__reset">
          <input class="" type="reset" value="Restaurar">
        </div>

        <div class="btn__cancelar">
          <a class="btn__acancelar" href="{{ route('representacion.index') }}">Cancelar</a>

        </div>
      </div>
    </form>


  </div>
</div>
</div>
</div>
