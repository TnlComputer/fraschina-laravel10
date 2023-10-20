<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Transportes') }} Page

    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <a class="ocultar" href="{{ route('transporte.create') }}">
              <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nuevo Transporte</button>
            </a>
            <form method="post" action="{{  route('transporte.search') }}" class="px-6">
              @csrf
              <input type="text" placeholder="Type to search" name="name" value="{{ old('name') }}">
              <button type="submit" class="p-2 bg-gray-700 text-white sm:rounded-lg">Buscar</button>
            </form>
          </div>

          <table>
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th>Razón social</th>
                <th colspan="4">Dirección</th>
                <th>Cod.Post</th>
                <th>Telefono</th>
                <th></th>
              </tr>
            </thead>
            @forelse($transportes as $transporte)
            <tr>
              <td>
                <a href="{{ route('transporte.show', $transporte->id) }}" class="">
                  <i class="fa-regular fa-eye fa-md"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('transporte.edit', $transporte->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square fa-md" style="color: #13b60d;"></i>
                </a>
              </td>
              <td>{{ $transporte->razonsocial }}</td>
              <td>{{ $transporte->dire_calle }}</td>
              <td>{{ $transporte->dire_nro }}</td>
              <td>{{ $transporte->piso }}</td>
              <td>{{ $transporte->dpto }}</td>
              <td>{{ $transporte->codpost }}</td>
              <td>{{ $transporte->telefono }}</td>
              <td>
                <form method="POST" action="{{ route('transporte.destroy', $transporte->id) }}" class="ocultar">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class='fa-solid fa-trash fa-md' style="color: #ff0000;"></i> </button>
                </form>
              </td>
            </tr>
            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $transportes->links() }}
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>