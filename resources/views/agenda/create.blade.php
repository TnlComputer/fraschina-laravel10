<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Nuevo Contacto Agenda Gral') }}
    </h2>
  </x-slot>
  <div class="py-4">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left ">
          <div class="sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <form action="{{ route('agenda.store') }}" method="POST" class="personal__form">
              @csrf
              {{-- @method('put') --}}

              <div class="personal__div">
                <label class="personal__label" for="nombre">Nombre</label>
                <input class="personal__input" type="text" name="nombre" id="nombre" value="" placeholder="Ingrese el nombre">
                <input type="hidden" name="status" id="status" value="A">

              </div>

              <div class="personal__div">
                <label class="personal__label" for="apellido">Apellido</label>
                <input class="personal__input" type="text" name="apellido" id="apellido" value="" placeholder="Ingrese el apellido">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="empresa_institucion">Empresa - Institución</label>
                <input class="personal__input" type="text" name="empresa_institucion" id="empresa_institucion" value="" placeholder="Ingrese la Empresa Institución">
              </div>

              <div class="personal__div">
                <label class="personal__label" for="cargo_id">Profesión</label>
                <select name="profesion_id" id="profesion_id" class="personal__input select2">

                  @foreach ($profesiones as $profesion)
                  {{-- <option value="{{ $profesion->id }}" {{ 132 == $profesion->id ? 'selected' : '' }}>{{ $profesion->nombreprofesion  }} --}}
                  <option value="{{ $profesion->id }}">{{ $profesion->nombreprofesion  }} </option>
                  @endforeach
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="telparticular">Tel Particular</label>
                <input class="personal__input" type="text" name="telparticular" id="telparticular" value="" placeholder="Ingrese su teléfono particular" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="teldirecto">Tel Laboral</label>
                <input class="personal__input" type="text" name="teldirecto" id="teldirecto" value="" placeholder="Ingrese el teléfono directo" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="interno">Interno</label>
                <input class="personal__input" type="text" name="interno" id="interno" value="" placeholder="Ingrese el interno" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="telcelular">Celular</label>
                <input class="personal__input" type=" text" name="telcelular" id="telcelular" value="" placeholder="Escriba el número de Celular" />
              </div>


              <div class="personal__div">
                <label class="personal__label" for="email">Email</label>
                <input class="personal__input" type="email" name="email" id="email" value="" placeholder="Escrila el correo electrónico" />
              </div>

              <div class="personal__div">
                <label class="personal__label" for="profesion_id">Dirección</label>
                <select name="profesion_id" id="profesion_id" class="personal__input">
                  {{-- @foreach ($profesiones as $profesion)
                  <option value="{{ $profesion->id }}" {{ 132 == $profesion->id ? 'selected' : '' }}>{{ $profesion->nombreprofesion  }}
                  </option>
                  @endforeach --}}
                </select>
              </div>

              <div class="personal__div">
                <label class="personal__label" for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" cols="30" rows="3" class="personal__input"></textarea>
              </div>

              <div class="personal__btn">
                <div class="btn__aceptar">
                  <input class="btn__aceptar" type="submit" value="Aceptar">
                </div>
                <div class="btn__reset">
                  <input class="btn__reset" type="reset" value="Restaurar">
                </div>
                <div class="btn__cancelar">
                  <form action="{{ URL::route('agenda.index') }}">
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
