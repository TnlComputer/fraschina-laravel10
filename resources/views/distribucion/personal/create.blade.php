<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Nuevo Contacto') }} - {{ $distribucion->id }}

    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class="sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('distribucion_personal.store') }}" method="POST" class="personal__form">
              @csrf
              <div class="personal__div">
                <label class="personal__label" for="nombre">Nombre</label>
                <input class="personal__input" type="text" name="nombre" id="nombre" value="" placeholder="Ingrese el nombre">
                <input type="hidden" name="distribucion_id" value="{{ $distribucion->id }}">
                <input type="hidden" name="status" id="status" value="A">

              </div>

              <div class="personal__div">
                <label class="personal__label" for="apellido">Apellido</label>
                <input class="personal__input" type="text" name="apellido" id="apellido" value="" placeholder="Ingrese el apellido" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="area_id">Area</label>
                <select class="form-select" name="area_id" id="single-select-field" data-placeholder="Seleccione un Area">
                  <option></option>
                  @foreach ($areas as $area)
                  <option value="{{ $area->id }}">{{ $area->area  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="cargo_id">Cargo</label>
                <select class="form-select" name="cargo_id" id="single-select-field-1" data-placeholder="Seleccione un Cargo">
                  <option></option>
                  @foreach ($cargos as $cargo)
                  <option value="{{ $cargo->id }}">{{ $cargo->cargo  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="teldirecto">Tel Directo</label>
                <input class="personal__input" type="text" name="teldirecto" id="teldirecto" value="" placeholder="Ingrese el teléfono directo" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="interno">Interno</label>
                <input class="personal__input" type="text" name="interno" id="interno" value="" placeholder="Ingrese el interno" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="telcelular">Tel Celular</label>
                <input class="personal__input" type="text" name="telcelular" id="telcelular" value="" placeholder="Escriba el número de Celular" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="telparticular">Tel Particular</label>
                <input class="personal__input" type="text" name="telparticular" id="telparticular" value="" placeholder="Ingrese su teléfono particular" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="email">Email</label>
                <input class="personal__input" type="email" name="email" id="email" value="" placeholder="Escrila el correo electrónico" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="profesion_id">Profesión</label>
                <select class="form-select" name="profesion_id" id="single-select-field-2" data-placeholder="Seleccione una Profesión">
                  <option></option>
                  @foreach ($profesiones as $profesion)
                  <option value="{{ $profesion->id }}">{{ $profesion->nombreprofesion  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="personal__input"></textarea>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="fuera">Fuera</label>
                <select name="fuera" id="fuera" class="personal__input">
                  <option value="0">NO</option>
                  <option value="1">SI</option>
                </select>
              </div>

              <div class="personal__btn">
                <div class="btn__aceptar">
                  <input class="" type="submit" value="Aceptar">
                </div>

                <div class="btn__reset">
                  <input class="" type="reset" value="Restaurar">
                </div>
                <div class="btn__cancelar">
                  <a class="btn__acancelar" href="{{ route('distribucion.show',  ['distribucion' => $distribucion->id]) }}">Cancelar</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
