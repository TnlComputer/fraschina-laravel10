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
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#altaModal" aria-labelledby=" altaModalLabel" role="dialog">Nuevo</button>
            </div>
            <div class="div__buscar">
              <form method="get" action="{{  route('representacion.index') }}" class="form__buscar">
                @csrf
                <span class="span__input-buscar">
                  <input type="text" placeholder="Type to search" name="name" value="{{ $name }}" class="input__buscar">
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
                  <i class="fa-regular fa-eye icon-view"></i>
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
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{ $representacion->id }}" data-bs-razonsocial="{{ $representacion->razonsocial }}" aria-labelledby="deleteModalLabel" role="dialog">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </td>
            </tr>
            @empty
            <td style="widch:100%">

              <p>No hay registros para mostrar...</p>
            </td>
            @endforelse
            {{ $representaciones->links() }}
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('representacion.modal-alta')

  {{-- @include('representacion.modal-edit'); --}}

  @include('representacion.modal-delete')
</x-app-layout>
</body>

<script>
  $('#deleteModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('bs-id') // Extract info from data-* attributes
    var razonsocial = button.data('bs-razonsocial') // Extract info from data-* attributes

    action = $('#formDelete').attr('data-action').slice(0, -1);
    action += id;

    $('#formDelete').attr('action', action);

    // console.log(id);
    // console.log(razonsocial);
    // console.log(action);

    var modal = $(this)
    modal.find('.modal-body').text('Desea eliminar a ' + razonsocial)
    modal.find('.modal-body value').val(id)
    // modal.find('.modal-form valor').text(id)
  });

</script>
</html>
