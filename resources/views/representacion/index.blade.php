<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-left">
      {{ __('Representación') }}
    </h2>
  </x-slot>
  <div class="py-2">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 text-gray-900 text-left text-xs">
          <div class="barra__index">
            <div class="div__nuevo">
              <form action="{{  route('representacion.create') }}">
                <input class="btn__nuevo" type="submit" value="Nueva Representación">
              </form>
            </div>
            <div class="div__buscar">
              <form method="get" action="{{  route('representacion.index') }}" class="form__buscar">
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
                <th class="">Razón social</th>
                <th class="">Dirección</th>
                <th class="">Barrio</th>
                <th class="">Localidad</th>
                <th class="">Zona</th>
                <th class="">Teléfono</th>
                <th class="">Email</th>
                <th class="">Cuit</th>
                <th class="">Marcas</th>
                <th></th>
              </tr>
            </thead>
            @forelse($representaciones as $representacion)
            <tr>
              <td>
                <a href="{{ route('representacion.show', $representacion->id) }}" class="">
                  <i class="fa-regular fa-eye fa-md"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('representacion.edit', $representacion->id) }}" class="ocultar ">
                  <i class="fa-regular fa-pen-to-square icon__edit"></i>
                </a>
              </td>
              <td data-titulo="Razón social">{{ $representacion->razonsocial }}</td>
              <td data-titulo="Dirección">
                {{ $representacion->dire_calle }}
                {{ $representacion->dire_nro }}
                @if($representacion->piso != '')
                {{ $representacion->piso }}
                @endif
                @if($representacion->dpto != '')
                Piso {{ $representacion->dpto }}
                @endif
                @if($representacion->codpost != '')
                - ({{ $representacion->codpost }})
                @endif
              </td>
              <td data-titulo="Barrio">{{ $representacion->barrio }}</td>
              <td data-titulo="Localidad">{{ $representacion->localidad }}</td>
              <td data-titulo="Zona">{{ $representacion->zona }}</td>
              <td data-titulo="Teléfono">{{ $representacion->telefono }}</td>
              <td class="" data-titulo="Email">{{ $representacion->correo }}</td>
              <td data-titulo="Cuit">{{ $representacion->cuit }}</td>
              <td data-titulo="Marcas">{{ $representacion->marcas }}</td>
              <td>
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $representacion->id }}">

                  <i class="fas fa-trash-alt"></i>
                </button>


                {{-- <form method="POST" action="{{ route('representacion.destroy', $representacion->id) }}" class="ocultar">
                @csrf
                @method(' DELETE')
                <button type="submit"><i class='fa-solid fa-trash fa-md' style="color: #ff0000;"></i> </button>
                </form> --}}
              </td>
            </tr>
            @empty
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $representaciones->links() }}
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-{{ $representacion->id }}" tabindex="-1" aria-labelledby="representacionModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <form action="{{ route('representacion.destroy', $representacion->id) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-content bg-danger">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="representacionModalLabel">Eliminar cliente</h1>


            {{-- <h4 class="modal-title">Eliminar cliente</h4> --}}
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Desea eliminar el cliente {{ $representacion->id }} - {{ $representacion->razonsocial }}</p>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>

          {{-- <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cerrar</button> --}}
          <button type="submit" class="btn btn-outline-light">Eliminar</button>
        </div>
    </div>
    </form>
  </div>
  </div>


</x-app-layout>



{{-- <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


</body>
</html>
