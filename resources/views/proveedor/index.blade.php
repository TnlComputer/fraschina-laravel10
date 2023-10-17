<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Proveedores') }}

    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-stretch">
            <a class="ocultar" href="{{ route('proveedor.create') }}">
              <button class="p-2 bg-gray-700 text-white sm:rounded-lg" type="button">Nuevo Proveedor</button>
            </a>
            <form method="post" action="{{  route('proveedor.search') }}" class="px-6">
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
            @forelse($proveedores as $proveedor)
            <tr>
              <td>
                <a href="{{ route('proveedor.show', $proveedor->id) }}" class="">
                  <i class="fa-regular fa-eye fa-md"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square fa-md" style="color: #13b60d;"></i>
                </a>
              </td>
              <td>{{ $proveedor->razonsocial }}</td>
              <td>{{ $proveedor->dire_calle }}</td>
              <td>{{ $proveedor->dire_nro }}</td>
              <td>{{ $proveedor->piso }}</td>
              <td>{{ $proveedor->dpto }}</td>
              <td>{{ $proveedor->codpost }}</td>
              <td>{{ $proveedor->telefono }}</td>
              <td>
                <form method="POST" action="{{ route('proveedor.destroy', $proveedor->id) }}" class="ocultar">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class='fa-solid fa-trash fa-md' style="color: #ff0000;"></i> </button>
                </form>
              </td>


            </tr>
            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $proveedores->links() }}
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
