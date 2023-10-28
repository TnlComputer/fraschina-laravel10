<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Agros') }}

    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class="barra__index">
            <div class="div__nuevo">
              <form action="{{  route('agro.create') }}">
                <input class="btn__nuevo" type="submit" value="Nuevo">
              </form>
            </div>
            <div class="div__buscar">
              <form method="get" action="{{  route('agro.index') }}" class="form__buscar">
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
            @forelse($agros as $agro)
            <tr>
              <td>
                <a href="{{ route('agro.show', $agro->id) }}" class="">
                  <i class="fa-regular fa-eye icon-view"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('agro.edit', $agro->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square icon-edit"></i>
                </a>
              </td>
              <td>{{ $agro->razonsocial }}</td>
              <td>{{ $agro->dire_calle }}</td>
              <td>{{ $agro->dire_nro }}</td>
              <td>{{ $agro->piso }}</td>
              <td>{{ $agro->dpto }}</td>
              <td>{{ $agro->codpost }}</td>
              <td>{{ $agro->barrio }}</td>
              <td>{{ $agro->municipio }}</td>
              <td>{{ $agro->localidad }}</td>
              <td>{{ $agro->telefono }}</td>

              <td>
                <form method="POST" action="{{ route('agro.destroy', $agro->id) }}" class="ocultar">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class="fa-solid fa-trash icon-delete"></i> </button>
                </form>
              </td>
            </tr>

            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $agros->links() }}
          </table>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
