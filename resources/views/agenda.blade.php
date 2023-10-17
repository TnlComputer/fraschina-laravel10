<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Agenda General') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <form method="post" action="{{  route('agenda.search') }}" class="py-2">
          @csrf
          <input type="text" placeholder="Type to search" name="name" value="{{ old('name') }}">
          <button type="submit" class="p-2 bg-gray-700 text-white sm:rounded-lg">Buscar</button>
        </form>
        <div class=" text-xs">
          <table>
            <thead>
              <tr>
                <th>Nombre y Apellido</th>
                <th>Empresa-Institución</th>
                <th>Profesión-Especialidad-Oficio</th>
                <th>Telefono Particular</th>
                <th>Telefono Laboral</th>
                <th>interno</th>
                <th>Celular</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Observaciones</th>
              </tr>
            </thead>
            @forelse($agendas as $agenda)
            <tr class=" text-xs">
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
            </tr>
            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $agendas->links() }}
          </table>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
