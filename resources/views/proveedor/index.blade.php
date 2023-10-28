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
          <div class="barra__index">
            <div class="div__nuevo">
              <form action="{{  route('proveedor.create') }}">
                <input class="btn__nuevo" type="submit" value="Nuevo">
              </form>
            </div>
            <div class="div__buscar">
              <form method="get" action="{{  route('proveedor.index') }}" class="form__buscar">
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
                <th></th>
                <th>Razón social</th>
                <th colspan="4">Dirección</th>
                <th>Cod.Post</th>
                <th>Barrio</th>
                <th>Municipio</th>
                <th>Localidad</th>
                <th>Telefono</th>

                <th></th>
              </tr>
            </thead>
            @forelse($proveedores as $proveedor)
            <tr>
              <td>
                <a href="{{ route('proveedor.show', $proveedor->id) }}" class="">
                  <i class="fa-regular fa-eye icon-view"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square icon-edit"></i>

                </a>
              </td>
              <td>{{ $proveedor->razonsocial }}</td>
              <td>{{ $proveedor->dire_calle }}</td>
              <td>{{ $proveedor->dire_nro }}</td>
              <td>{{ $proveedor->piso }}</td>
              <td>{{ $proveedor->dpto }}</td>
              <td>{{ $proveedor->codpost }}</td>
              <td>{{ $proveedor->barrio }}</td>
              <td>{{ $proveedor->municipio }}</td>
              <td>{{ $proveedor->localidad }}</td>
              <td>{{ $proveedor->telefono }}</td>
              <td>
                <form method="POST" action="{{ route('proveedor.destroy', $proveedor->id) }}" class="ocultar">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class="fa-solid fa-trash icon-delete"></i> </button>
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
