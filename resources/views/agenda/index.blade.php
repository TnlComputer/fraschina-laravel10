<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Agenda General') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class="barra__index">
            <div class="div__nuevo">
              <form action="{{  route('agenda.create') }}">
                <input class="btn__nuevo" type="submit" value="Nuevo Contacot">
              </form>
            </div>
            <div class="div__buscar">
              <form method="get" action="{{  route('agenda.index') }}" class="form__buscar">
                @csrf
                <span class="span__input-buscar">
                  <input type="text" placeholder="Type to search" name="name" value="{{ old('name') }}" class="input__buscar">
                </span>
                <span class="span__btn-buscar">
                  <input type="submit" value="Buscar" class="btn__buscar">
                </span>
              </form>
            </div>
          </div>

          <table>
            <thead>
              <tr>
                <th></th>
                <th>Nombre y Apellido</th>
                <th>Empresa-Institución</th>
                <th>Profesión-Especialidad-Oficio</th>
                <th>Tel Particular</th>
                <th>Tel Laboral</th>
                <th>int</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Observaciones</th>
                <th></th>
              </tr>
            </thead>
            @forelse($agendas as $agenda)
            <tr class=" text-xs">
              <td>
                <a href="{{ route('agenda.edit', $agenda->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square fa-md" style="color: #13b60d;"></i>
                </a>
              </td>
              <td data-titulo="Nombre Apellido">{{ $agenda->nombre }} {{ $agenda->apellido }}</td>
              <td data-titulo="Empresa/Institución">{{ $agenda->empresa_institucion }}</td>
              <td data-titulo="Prof./Esp./Oficio">{{ $agenda->profesion_especialidad_oficio }}</td>
              <td data-titulo="Particular">{{ $agenda->tel_particular }}</td>
              <td data-titulo="Laboral">{{ $agenda->tel_laboral }}</td>
              <td data-titulo="Interno">{{ $agenda->interno }}</td>
              <td data-titulo="Celular">{{ $agenda->celular }}</td>
              <td data-titulo="Email">{{ $agenda->mail }}</td>
              <td data-titulo="Dirección">{{ $agenda->direccion }}</td>
              <td data-titulo="Observaciones">{{ $agenda->observaciones }}</td>
              <td>
                <form method="POST" action="{{ route('agenda.destroy', $agenda->id) }}" class="ocultar">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class='fa-solid fa-trash fa-md' style="color: #ff0000;"></i> </button>
                </form>
              </td>
            </tr>
            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $agendas->links() }}
          </table>

          {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
