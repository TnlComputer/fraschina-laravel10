<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Representación Personal') }} Edición
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class="sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('representacion_personal.update', $personal) }}" method="POST" class="personal__form">
              @csrf
              @method('put')

              <div class="personal__div">
                <label class="personal__label" for="nombre">Nombre</label>
                <input class="personal__input" type="text" name="nombre" id="nombre" value="{{ $personal->nombre }}" placeholder="Ingrese el nombre">
                <input type="hidden" name="representacion_id" id="representacion_id" value="{{ $personal->representacion_id }}">
                <input type="hidden" name="id" id="id" value="{{ $personal->id }}">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="apellido">Apellido</label>
                <input class="personal__input" type="text" name="apellido" id="apellido" value="{{ $personal->apellido }}" placeholder="Ingrese el apellido" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="area_id">Area</label>
                <select name="area_id" id="area_id" class="personal__input">
                  @foreach ($areas as $area)
                  <option value="{{ $area->id }}" {{ $personal->area_id == $area->id ? 'selected' : '' }}>{{ $area->area  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="cargo_id">Cargo</label>
                <select name="cargo_id" id="cargo_id" class="personal__input">
                  @foreach ($cargos as $cargo)
                  <option value="{{ $cargo->id }}" {{ $personal->cargo_id == $cargo->id ? 'selected' : '' }}>{{ $cargo->cargo  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="teldirecto">Tel Directo</label>
                <input class="personal__input" type="text" name="teldirecto" id="teldirecto" value="{{ $personal->teldirecto }}" placeholder="Ingrese el teléfono directo" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="interno">Interno</label>
                <input class="personal__input" type="text" name="interno" id="interno" value="{{ $personal->interno }}" placeholder="Ingrese el interno" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="telcelular">Tel Celular</label>
                <input class="personal__input" type=" text" name="telcelular" id="telcelular" value="{{ $personal->telcelular }}" placeholder="Escriba el número de Celular" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="telparticular">Tel Particular</label>
                <input class="personal__input" type=" text" name="telparticular" id="telparticular" value="{{ $personal->telparticular }}" placeholder="Ingrese su teléfono particular" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="email">Email</label>
                <input class="personal__input" type="email" name="email" id="email" value="{{ $personal->email }}" placeholder="Escrila el correo electrónico" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="profesion_id">Profesión</label>
                <select name="profesion_id" id="profesion_id" class="personal__input">
                  @foreach ($profesiones as $profesion)
                  <option value="{{ $profesion->id }}" {{ $personal->profesion_id == $profesion->id ? 'selected' : '' }}>{{ $profesion->nombreprofesion  }}
                  </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="personal__input">{{ $personal->observaciones }}</textarea>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="fuera">Fuera</label>
                <select name="fuera" id="fuera" class="personal__input">
                  <option value="0" {{ $personal->fuera == 0 ? 'selected' : '' }}>NO</option>
                  <option value="1" {{ $personal->fuera == 1 ? 'selected' : '' }}>SI</option>
                </select>
              </div>

              <div class="personal__btn">
                <div class="btn__aceptar">
                  <input class="btn__aceptar" type="submit" value="Aceptar">
                </div>

                <div class="btn__reset">
                  <input class="btn__reset" type="reset" value="Restaurar">
                </div>

                <div class="btn__cancelar">
                  <form action="{{ URL::route('representacion.show', ['representacion' => $personal->representacion_id]) }}">
                    <input class=" btn__aceptar" type="submit" value="Cancelar">
                  </form>
                </div>

              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
