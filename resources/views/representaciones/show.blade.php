<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
      {{ __('Representación') }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900  text-sm text-left">
          <table>
            <tr>
              <th>Razón social</th>
              <th>Dirección</th>
              <th>Cod.Post</th>
              <th>Teléfono</th>
              <th>Barrio</th>
              <th>Localidad</th>
              <th>Municipio</th>
              <th>Zona</th>
              <th>Cuit</th>
              <th>Email</th>
            </tr>
            <tr class="p-6 text-gray-900 text-md text-xs">
              <td class="w-1/12">{{ $represento->razonsocial }}</td>
              <td class="w-1/12">{{ $represento->dire_calle }} {{ $represento->dire_nro }}
                {{ $represento->piso }} {{ $represento->dpto }}</td>
              <td class="w-1/12">{{ $represento->codpost }}</td>
              <td class="w-2/12">{{ $represento->telefono }}</td>
              <td class="w-1/12">{{ $represento->barrio }}</td>
              <td class="w-1/12">{{ $represento->localidad }}</td>
              <td class="w-1/12">{{ $represento->municipio }}</td>
              <td class="w-1/12">{{ $represento->zona }}</td>
              <td class="w-1/12">{{ $represento->cuit }}</td>
              <td class="w-1/12">{{ $represento->correo }}</td>
            </tr>
          </table>
          <div class="py-4 text-gray-900 text-sm">
            <table>
              <tr>
                <th class="w-1/12">Marcas</th>
                <th class="w-6/12">Información</th>
                <th class="w-5/12">Comentarios</th>
              </tr>
              <tr class="text-gray-800 text-md text-sm align-top">
                <td class="w-1/12">{{ $represento->infoenparticular }}</td>
                <td class="w-6/12">{{ $represento->info }}</td>
                <td class="w-5/12">{{ $represento->comentarios }}</td>


              </tr>
            </table>
          </div>

          <div>
            <div class="text-gray-900  text-sm text-left">
              <table>
                <tr>
                  <td></td>
                  <th class="w-1/12">Apellido y Nombre</th>
                  <th class="w-1/12">Area</th>
                  <th class="w-1/12">Cargo</th>
                  <th class="w-1/12">Cateogria</th>
                  <th class="w-1/12">Tel Directo</th>
                  <th class="w-1/12">Interno</th>
                  <th class="w-1/12">Celular</th>
                  <th class="w-1/12">Tel.Partticular</th>
                  <th class="w-1/12">Profesión</th>
                  <th class="w-1/12">Información</th>
                  <th class="w-1/12">Email</th>

                  {{-- <th>Fuera</th> --}}
                </tr>
                @forelse($representaciones_personal as $rp)
                <tr class="text-gray-900 text-xs">
                  <td class=" w-0">
                    @if($rp->fuera === 1)
                    <i class="far fa-thumbs-down" style="color: #ff0000;"></i>
                    @endif
                  </td>
                  <td class="w-1/12">{{ $rp->apellido }} {{ $rp->nombre }}</td>
                  <td class="w-1/12">{{ $rp->area }}</td>
                  <td class="w-1/12">{{ $rp->cargo }}</td>
                  <td class="w-1/12">{{ $rp->profesion }}</td>
                  <td class="w-1/12">{{ $rp->teldirecto }}</td>
                  <td class="w-1/12">{{ $rp->interno }}</td>
                  <td class="w-1/12">{{ $rp->telcelular }}</td>
                  <td class="w-1/12">{{ $rp->telparticular }}</td>
                  <td class="w-1/12">{{ $rp->profesion }}</td>
                  <td class="w-1/12">{{ $rp->infoenparticular }}</td>
                  <td class="w-1/12">{{ $rp->email }}</td>
                  {{-- <td>{{ $rp->fuera }}</td> --}}
                </tr>
                @empty
                <p>No hay registros para mostrar...</p>
                @endforelse
                {{ $representaciones_personal->links() }}
              </table>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
