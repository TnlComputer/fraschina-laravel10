<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Nueva Distribucion') }}
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('distribucion.store') }}" method="post">
              @csrf
              <div class="card__div">
                <label class="card__label">Sistema</label>
                <input class="card__input" type="text" name="clisg_id" id="clisg_id" value="" placeholder="Nro Sistema Gestión">
                <input type="hidden" name="status" id="status" value="A">
              </div>

              <div class="card__div">
                <label class="card__label">Nombre Fantasía</label>
                <input class="card__input" type="text" name="nomfantasia" id="nomfantasia" value="" placeholder="Ingrese nombre de fantasía">
              </div>

              <div class="card__div">
                <label class="card__label">Razón social</label>
                <input class="card__input" type="text" name="razonsocial" id="razonsocial" value="" placeholder="Ingrese razón social">
              </div>

              <div class="card__div">
                <label class="card__label" for="dire_calle_id">Dirección</label>
                <select class="form-select" name="dire_calle_id" id="single-select-field" required data-placeholder="Seleccione una Calle">
                  <option></option>
                  @foreach ($calles as $calle)
                  <option value="{{ $calle->id }}">{{ $calle->calle  }} </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="dire_nro">Altura</label>
                <input class="card__input" type="text" name="dire_nro" id="dire_nro" value="" placeholder="Ingrese la altura" required>
              </div>

              <div class="card__div">
                <label class="card__label" for="dpto">Dpto</label>
                <input class="card__input" type="text" name="dpto" id="dpto" value="" placeholder="Ingrese la unidad de departamento">
              </div>

              <div class="card__div">
                <label class="card__label" for="piso">Piso</label>
                <input class="card__input" type="text" name="piso" id="piso" value="" placeholder="Ingrese el piso">
              </div>

              <div class="card__div">
                <label class="card__label" for="codpost">Cod.Post</label>
                <input class="card__input" type="text" name="codpost" id="codpost" value="" placeholder="Ingrese el Código Postal">
              </div>

              <div class="card__div">
                <label class="card__label" for="barrio_id">Barrio</label>
                <select class="form-select" name="barrio_id" id="single-select-field-1" required data-placeholder="Seleccione una Barrio">
                  <option></option>
                  @foreach ($barrios as $barrio)
                  <option value="{{ $barrio->id }}">{{ $barrio->nombrebarrio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="localidad_id">Localidad</label>
                <select class="form-select" name="localidad_id" id="single-select-field-2" required data-placeholder="Seleccione una Localidad">
                  <option></option>
                  @foreach ($localidades as $localidad)
                  <option value="{{ $localidad->id }}">{{ $localidad->localidad  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="municipio_id">Municipio</label>
                <select class="form-select" name="municipio_id" id="single-select-field-3" required data-placeholder="Seleccione una Municipio o Ciudad">
                  <option></option>
                  @foreach ($municipios as $municipio)
                  <option value="{{ $municipio->id }}">{{ $municipio->ciudadmunicipio  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="zona_id">Zona</label>
                <select class="form-select" name="zona_id" id="single-select-field-4" required data-placeholder="Seleccione una Zona">
                  <option></option>
                  @foreach ($zonas as $zona)
                  <option value="{{ $zona->id }}">{{ $zona->nombre  }}
                  </option>
                  @endforeach
                </select>
              </div>


              <div class="card__div">
                <label class="card__label" for="telefono">Telefono</label>
                <input class="card__input" type="text" name="telefono" id="telefono" value="" placeholder="Ingrese el telefono">
              </div>

              <div class="card__div">
                <label class="card__label" for="cuit">Cuit</label>
                <input class="card__input" type="text" name="cuit" id="cuit" value="" placeholder="Ingrese el CUIT">

              </div>

              <div class="card__div">
                <label class="card__label" for="correo">Email</label>
                <input class="card__input" type="email" name="correo" id="correo" value="" placeholder="Ingrese el correo electrónico">

              </div>

              <div class="card__div">
                <label class="card__label" for="marcas">Marcas</label>
                <input class="card__input" type="text" name="marcas" id=marcas"" value="" placeholder="Ingrese las marcas">

              </div>

              <div class="card__div">
                <label class="card__label" for="contacto_id">Contacto</label>
                <select class="form-select" name="contacto_id" id="single-select-field-5" required data-placeholder="Seleccione una Contacto">
                  <option></option>
                  @foreach ($contactos as $contacto)
                  <option value="{{ $contacto->id }}">{{ $contacto->contacto  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="auto">Automatizado</label>
                <select class="card__input" name="auto" id="auto">
                  <option value="NO">NO
                  </option>
                  <option value="SI">SI
                  </option>
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="veraz_id">Veraz</label>
                <select class="card__input" name="veraz_id" id="veraz_id">
                  <option value="6"></option>
                  @foreach ($veraz as $vera)
                  <option value="{{ $vera->id }}">{{ $vera->estado  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="estado_id">Estado</label>
                <select class="card__input" name="estado_id" id="estado_id">
                  <option value="4"></option>
                  @foreach ($estados as $estado)
                  <option value="{{ $estado->id }}">{{ $estado->nomEstado  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="card__div">
                <label class="card__label" for="desde">Desde</label>
                <input class="card__input" type="time" name="desde" id="desde" value="" placeholder="Ingrese el horario AM de recepción">
              </div>

              <div class="card__div">
                <label class="card__label" for="hasta">Hasta</label>
                <input class="card__input" type="time" name="hasta" id="hasta" value="" placeholder="Ingrese el horario AM de recepción">
              </div>

              <div class="card__div">
                <label class="card__label" for="desde1">Desde</label>
                <input class="card__input" type="time" name="desde1" id="desde1" value="" placeholder="Ingrese el horario PM de recepción">

              </div>

              <div class="card__div">
                <label class="card__label" for="hasta1">Hasta</label>
                <input class="card__input" type="time" name="hasta1" id="hasta1" value="" placeholder="Ingrese el horario PM de recepción">
              </div>

              <div class="card__div">
                <label class="card__label" for="productoCDA">Productos CDA</label>
                <input class="card__input" type="text" name="productoCDA" id="productoCDA" value="" placeholder="Ingrese los productos">

              </div>

              {{-- <div class="card__div">
                <label class="card__label" for="productos_id">Producto id</label>
                <input class="card__input" type="text" name="productos_id" id="productos_id" value="{{ $distribucion->productos_id }}">
          </div> --}}

          <div class="card__div">
            <label class="card__label" for="lunes">Lunes</label>
            <select class="card__input" name="lunes" id="lunes">
              <option value="NO">NO
              </option>
              <option value="SI">SI
              </option>
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="sabado">Sabado</label>
            <select class="card__input" name="sabado" id="sabado">
              <option value="NO">NO
              </option>
              <option value="SI">SI
              </option>
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="fac_imp">Factura Impresa</label>
            <select class="card__input" name="fac_imp" id="fac_imp">
              <option value="NO">NO
              </option>
              <option value="SI">SI
              </option>
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="obsrecep">Observaciones Recepción</label>
            <input class="card__input" type="text" name="obsrecep" id="obsrecep" value="" placeholder="Ingrese las observaciones para la recepción">

          </div>

          <div class="card__div">
            <label class="card__label" for="cobrar_id">cobrar</label>
            <select class="card__input" name="cobrar_id" id="cobrar_id" required>
              <option value=3>Seleccione una Opción</option>
              @foreach ($cobrar as $cobrar)
              <option value="{{ $cobrar->id }}">{{ $cobrar->accion  }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="cobro_id">Condición de Pago</label>
            <select class="card__input" name="cobro_id" id="cobro_id" required>
              <option value=4>Seleccione una Opción</option>
              @foreach ($conpagos as $conpago)
              <option value="{{ $conpago->id }}">{{ $conpago->nombre  }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="tcobro_id">Forma de Pago</label>
            <select class="card__input" name="tcobro_id" id="tcobro_id" required>
              <option value=5>Seleccione una Opción</option>
              @foreach ($tipopagos as $tipopago)
              <option value="{{ $tipopago->id }}">{{ $tipopago->nombre }} </option>
              @endforeach
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="info">Información</label>
            <textarea class="card__input" name="info" id="info" cols="60" rows="5" placeholder="Ingrese la información"></textarea>
            <input type="hidden" name="status" value="A">
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


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
