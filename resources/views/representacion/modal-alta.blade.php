<div class="modal fade" id="altaModal" tabindex="-1" data-bs-backdrop="static" role="document">
  <div class=" modal-dialog modal-dialog-centered"">
    <div class=" modal-content">
    <div class="modal-header">
      <div class="modal-title fs-5">Alta Cliente Distribución</div>
      <h5 class="modal-title fs-5" aria-labelledby="altaModalLabel"></h5>
      <button class="btn-close btn-secundary" data-bs-dismiss="modal" aria-label="Close">
      </button>
    </div>
    <form action="{{ route('representacion.store') }}" method="post" class="card__form" enctype="multipart/form-data">
      <div class="modal-body">
        @csrf
        <div class="card__div">
          <label class="card__label" for="razonsocial">Razón social</label>
          <input class="card__input" type="text" name="razonsocial" id="razonsocial" value="" placeholder="" required>
          <input type="hidden" name="status" id="status" value="A">
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
          <input class="card__input" type="text" name="telefono" id="telefono" value="" required>
        </div>

        <div class="card__div">
          <label class="card__label" for="barrio_id">Barrio</label>
          <select class="form-select" name="barrio_id" id="single-select-field" data-placeholder="Seleccione un Barrio" required>
            <option></option>
            @foreach ($barrios as $barrio)
            <option value="{{ $barrio->id }}">{{ $barrio->nombrebarrio  }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="card__div">
          <label class="card__label" for="localidad_id">Localidad</label>
          <select name="localidad_id" id="single-select-field-1" class="form-select card__input" data-placeholder="Seleccione una Localidad" required>
            <option></option>
            @foreach ($localidades as $localidad)
            <option value="{{ $localidad->id }}">{{ $localidad->localidad  }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="card__div">
          <label class="card__label" for="municipio_id">Municipio</label>
          <select name="municipio_id" id="single-select-field-2" class="form-select card__input" data-placeholder="Seleccione un Municipio o Ciudad" required>
            <option></option>
            @foreach ($municipios as $municipio)
            <option value="{{ $municipio->id }}">{{ $municipio->ciudadmunicipio  }} </option>
            @endforeach
          </select>
        </div>

        <div class="card__div">
          <label class="card__label" for="zona_id">Zona</label>
          <select name="zona_id" id="single-select-field-3" class="form-select card__input" data-placeholder="Seleccione una Zona" required>

            <option></option>
            @foreach ($zonas as $zona)
            <option value="{{ $zona->id }}">{{ $zona->nombre  }}</option>
            @endforeach
          </select>
        </div>

        <div class="card__div">
          <label class="card__label" for="cuit">Cuit</label>
          <input class="card__input" type="text" name="cuit" id="cuit" value="">
        </div>

        <div class="card__div">
          <label class="card__label" for="correo">Email</label>
          <input class="card__input" type="email" name="correo" id="correo" value="" required>
        </div>

        <div class="card__div">
          <label class="card__label" for="marcas">Marcas</label>
          <input class="card__input" type="text" name="marcas" id="marcas" value="">
        </div>

        <div class="card__div">
          <label class="card__label" for="info">Información</label>
          <textarea class="card__input" name="info" id="info" cols="60" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bg-gray-600" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary bg-blue-600">Ingresar</button>
    </form>
  </div>
</div>
</div>
</div>
