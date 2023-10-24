<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Molino') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class="barra__index">

            <div class="div__nuevo">
              <form action="{{  route('molino.create') }}">
                <input class="btn__nuevo" type="submit" value="Nueva Molino">
              </form>
            </div>

            <div class="div__buscar">
              <form method="get" action="{{  route('molino.index') }}" class="form__buscar">
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
                <th>Telefono</th>
                <th></th>
              </tr>
            </thead>
            @forelse($molinos as $molino)
            <tr>
              <td>
                <a href="{{ route('molino.show', $molino->id) }}" class="">
                  <i class="fa-regular fa-eye fa-md"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('molino.edit', $molino->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square fa-md" style="color: #13b60d;"></i>
                </a>
              </td>
              <td>{{ $molino->razonsocial }}</td>
              <td>{{ $molino->dire_calle }}</td>
              <td>{{ $molino->dire_nro }}</td>
              <td>{{ $molino->piso }}</td>
              <td>{{ $molino->dpto }}</td>
              <td>{{ $molino->codpost }}</td>
              <td>{{ $molino->telefono }}</td>
              <td>
                <form method="POST" action="{{ route('molino.destroy', $molino->id) }}" class="ocultar">
                  @csrf
                  @method(' DELETE')
                  <button type="submit"><i class='fa-solid fa-trash fa-md' style="color: #ff0000;"></i> </button>
                </form>
              </td>
            </tr>
            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $molinos->links() }}
          </table>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
