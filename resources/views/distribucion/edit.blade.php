<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Distribucion') }} Edit
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('distribucion.update', $distribucion) }}" method="post">
              @csrf
              @method('put')

              <div class="card__div">
                <label class="card__label">Sistema</label>
                <input class="card__input" type="text" name="clisg_id" id="clisg_id" value="{{ $distribucion->clisg_id }}" placeholder="Nro Sistema Gestión">
              </div>

              <div class="card__div">
                <label class="card__label">Nombre Fantasía</label>
                <input class="card__input" type="text" name="nomfantasia" id="nomfantasia" value="{{ $distribucion->nomfantasia }}" placeholder="Ingrese nombre de fantasía">
              </div>

              <div class="card__div">
                <label class="card__label">Razón social</label>
                <input class="card__input" type="text" name="razonsocial" id="razonsocial" value="{{ $distribucion->razonsocial }}" placeholder="Ingrese razón social">
              </div>

              <div class="card__div">
                <label class="card__label" for="dire_calle_id">Dirección</label>
                <select class="form-select" name="dire_calle_id" id="single-select-field" data-placeholder="Seleccione una Calle">
                  <option></option>
                  @foreach ($calles as $calle)
                  <option value="{{ $calle->id }}" {{ $distribucion->dire_calle_id == $calle->id ? 'selected' : '' }}>{{ $calle->calle  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="dire_nro">Altura</label>
                <input class="card__input" type="text" name="dire_nro" id="dire_nro" value="{{ $distribucion->dire_nro }}" placeholder="" required>
              </div>

              <div class="card__div">
                <label class="card__label" for="dpto">Dpto</label>
                <input class="card__input" type="text" name="dpto" id="dpto" value="{{ $distribucion->dpto }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="piso">Piso</label>
                <input class="card__input" type="text" name="piso" id="piso" value="{{ $distribucion->piso }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="codpost">Cod.Post</label>
                <input class="card__input" type="text" name="codpost" id="codpost" value="{{ $distribucion->codpost }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="barrio_id">Barrio</label>
                <select class="form-select" name="barrio_id" id="single-select-field-1" data-placeholder="Seleccione un Barrio">
                  <option></option>
                  @foreach ($barrios as $barrio)
                  <option value="{{ $barrio->id }}" {{ $distribucion->barrio_id == $barrio->id ? 'selected' : '' }}>{{ $barrio->nombrebarrio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="localidad_id">Localidad</label>
                <select class="form-select" name="localidad_id" id="single-select-field-2" data-placeholder="Seleccione una Localidad">
                  <option></option>
                  @foreach ($localidades as $localidad)
                  <option value="{{ $localidad->id }}" {{ $distribucion->localidad_id == $localidad->id ? 'selected' : '' }}>{{ $localidad->localidad  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="municipio_id">Municipio</label>
                <select class="form-select" name="municipio_id" id="single-select-field-3" data-placeholder="Seleccione un Municipio o Ciudad">
                  <option></option>
                  @foreach ($municipios as $municipio)
                  <option value="{{ $municipio->id }}" {{ $distribucion->municipio_id == $municipio->id ? 'selected' : '' }}>{{ $municipio->ciudadmunicipio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="zona_id">Zona</label>
                <select class="form-select" name="zona_id" id="single-select-field-4" data-placeholder="Seleccione una Zona">
                  <option></option>

                  @foreach ($zonas as $zona)
                  <option value="{{ $zona->id }}" {{ $distribucion->zona_id == $zona->id ? 'selected' : '' }}>{{ $zona->nombre  }}
                  </option>
                  @endforeach
                </select>
              </div>


              <div class="card__div">
                <label class="card__label" for="telefono">Telefono</label>
                <input class="card__input" type="text" name="telefono" id="telefono" value="{{ $distribucion->telefono }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="cuit">Cuit</label>
                <input class="card__input" type="text" name="cuit" id="cuit" value="{{ $distribucion->cuit }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="correo">Email</label>
                <input class="card__input" type="email" name="correo" id="correo" value="{{ $distribucion->correo }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="marcas">Marcas</label>
                <input class="card__input" type="text" name="marcas" id=marcas"" value="{{ $distribucion->marcas }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="contacto_id">Contacto</label>
                <select class="form-select" name="contacto_id" id="single-select-field-5" data-placeholder="Seleccione un Contacto">
                  <option></option>

                  @foreach ($contactos as $contacto)
                  <option value="{{ $contacto->id }}" {{ $distribucion->contacto_id == $contacto->id ? 'selected' : '' }}>{{ $contacto->contacto  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="auto">Automatizado</label>
                <select class="card__input" name="auto" id="auto">
                  <option value="NO" {{ $distribucion->auto == 'NO' ? 'selected' : '' }}>NO
                  </option>
                  <option value="SI" {{ $distribucion->auto == 'SI' ? 'selected' : '' }}>SI
                  </option>
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="veraz_id">Veraz</label>
                <select class="card__input" name="veraz_id" id="veraz_id">
                  @foreach ($veraz as $vera)
                  <option value="{{ $vera->id }}" {{ $distribucion->veraz_id == $vera->id ? 'selected' : '' }}>{{ $vera->estado  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="estado_id">Estado</label>
                <select class="card__input" name="estado_id" id="estado_id">
                  @foreach ($estados as $estado)
                  <option value="{{ $estado->id }}" {{ $distribucion->estado_id == $estado->id ? 'selected' : '' }}>{{ $estado->nomEstado  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="desde">Desde</label>
                <input class="card__input" type="time" name="desde" id="desde" value="{{ $distribucion->desde }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="hasta">Hasta</label>

                <input class="card__input" type="time" name="hasta" id="hasta" value="{{ $distribucion->hasta }}">

              </div>

              <div class="card__div">
                <label class="card__label" for="desde1">Desde</label>
                <input class="card__input" type="time" name="desde1" id="desde1" value="{{ $distribucion->desde1 }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="hasta1">Hasta</label>
                <input class="card__input" type="time" name="hasta1" id="hasta1" value="{{ $distribucion->hasta1 }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="productoCDA">Productos CDA</label>
                <input class="card__input" type="text" name="productoCDA" id="productoCDA" value="{{ $distribucion->productoCDA }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="lunes">Lunes</label>
                <select class="card__input" name="lunes" id="lunes">
                  <option value="NO" {{ $distribucion->lunes == 'NO' ? 'selected' : '' }}>NO
                  </option>
                  <option value="SI" {{ $distribucion->lunes == 'SI' ? 'selected' : '' }}>SI
                  </option>
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="sabado">Sabado</label>
                <select class="card__input" name="sabado" id="sabado">
                  <option value="NO" {{ $distribucion->sabado == 'NO' ? 'selected' : '' }}>NO
                  </option>
                  <option value="SI" {{ $distribucion->sabado == 'SI' ? 'selected' : '' }}>SI
                  </option>
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="fac_imp">Factura Impresa</label>
                <select class="card__input" name="fac_imp" id="fac_imp">
                  <option value="NO" {{ $distribucion->fac_imp == 'NO' ? 'selected' : '' }}>NO
                  </option>
                  <option value="SI" {{ $distribucion->fac_imp == 'SI' ? 'selected' : '' }}>SI
                  </option>
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="obsrecep">Observaciones Recepción</label>
                <input class="card__input" type="text" name="obsrecep" id="obsrecep" value="{{ $distribucion->obsrecep }}">
              </div>

              <div class="card__div">
                <label class="card__label" for="cobrar_id">cobrar</label>
                <select class="card__input" name="cobrar_id" id="cobrar_id">
                  @foreach ($cobrar as $cobrar)
                  <option value="{{ $cobrar->id }}" {{ $distribucion->cobrar_id == $cobrar->id ? 'selected' : '' }}>{{ $cobrar->accion  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="cobro_id">Condición de Pago</label>
                <select class="card__input" name="cobro_id" id="cobro_id">
                  @foreach ($conpagos as $conpago)
                  <option value="{{ $conpago->id }}" {{ $distribucion->cobro_id == $conpago->id ? 'selected' : '' }}>{{ $conpago->nombre  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="tcobro_id">Forma de Pago</label>
                <select class="card__input" name="tcobro_id" id="tcobro_id">
                  @foreach ($tipopagos as $tipopago)
                  <option value="{{ $tipopago->id }}" {{ $distribucion->tcobro_id == $tipopago->id ? 'selected' : '' }}>{{ $tipopago->nombre }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="info">Información</label>
                <textarea class="card__input" name="info" id="info" cols="60" rows="5">{{ $distribucion->info }}</textarea>
              </div>

              <div class="personal__btn">
                <div class="btn__aceptar">
                  <input class="" type="submit" value="Aceptar">
                </div>

                <div class="btn__reset">
                  <input class="" type="reset" value="Restaurar">
                </div>

                <div class="btn__cancelar">
                  <a class="btn__acancelar" href="{{ route('distribucion.index') }}">Cancelar</a>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
