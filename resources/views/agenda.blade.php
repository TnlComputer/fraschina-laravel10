<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Agenda General') }}

    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <table>
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

            </tr>

            @forelse($agendas as $agenda)
            <tr>
              <td>{{ $agenda->nomApe }}</td>
              <td>{{ $agenda->empresa_institucion }}</td>
              <td>{{ $agenda->profesion_especialidad_oficio }}</td>
              <td>{{ $agenda->tel_particular }}</td>
              <td>{{ $agenda->tel_laboral }}</td>
              <td>{{ $agenda->interno }}</td>
              <td>{{ $agenda->celular }}</td>
              <td>{{ $agenda->mail }}</td>
              <td>{{ $agenda->direccion }}</td>

              <td>{{ $agenda->celular }}</td>

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
