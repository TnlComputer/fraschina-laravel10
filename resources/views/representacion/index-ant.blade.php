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
            <div>
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#altaModal" aria-labelledby=" altaModalLabel" role="dialog">Nuevo</button>
            </div>
            <div class="div__buscar">
              <form method="get" action="{{  route('representacion.index') }}" class="form__buscar">
                @csrf
                <span class="span__input-buscar">
                  <input type="text" placeholder="Type to search" name="name" value="{{ old('name'), $name }}" class="input__buscar">
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
            <p>No hay registros para mostrar...</p>
            @endforelse
            {{ $representaciones->links() }}
          </table>
        </div>
      </div>
    </div>
  </div>


  {{-- Modal alta --}}
  <div class="modal fade" id="altaModal" tabindex="-1" data-bs-backdrop="static" role="document">
    <div class=" modal-dialog modal-dialog-centered"">
    <div class=" modal-content">
      <div class="modal-header">
        <div class="modal-title fs-5">Alta Cliente Distribución</div>
        <h5 class="modal-title fs-5" aria-labelledby="altaModalLabel"></h5>
        <button class="btn-close btn-secundary" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form action="{{ route('representacion.store') }}" method="post" class="card__form" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <div class="card__div">
            <label class="card__label" for="razonsocial">Razón social</label>
            <input class="card__input" type="text" name="razonsocial" id="razonsocial" value="" placeholder="" required>
            <input type="hidden" name="status" id="status" value="A">
          </div>

          <div class="card__div">
            <label class="card__label" for="dire_calle">Dirección</label>
            <input class="card__input" type="text" name="dire_calle" id="dire_calle" value="" placeholder="" required>
          </div>

          <div class="card__div">
            <label class="card__label" for="dire_nro">Altura</label>
            <input class="card__input" type="number" name="dire_nro" id="dire_nro" value="" placeholder="" required>
          </div>

          <div class="card__div">
            <label class="card__label" for="piso">Piso</label>
            <input class="card__input" type="text" name="piso" id="piso" value="">
          </div>

          <div class="card__div">
            <label class="card__label" for="dpto">Dpto</label>
            <input class="card__input" type="text" name="dpto" id="dpto" value="">
          </div>

          <div class="card__div">
            <label class="card__label" for="codpost">Cod.Post</label>
            <input class="card__input" type="text" name="codpost" id="codpost" value="">
          </div>

          <div class="card__div">
            <label class="card__label" for="telefono">Telefono</label>
            <input class="card__input" type="text" name="telefono" id="telefono" value="" required>
          </div>

          <div class="card__div">
            <label class="card__label" for="barrio_id">Barrio</label>
            <select class="form-select" name="barrio_id" id="single-select-field" data-placeholder="Seleccione un Barrio">
              <option></option>
              @foreach ($barrios as $barrio)
              <option value="{{ $barrio->id }}">{{ $barrio->nombrebarrio  }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="localidad_id">Localidad</label>
            <select name="localidad_id" id="single-select-field-1" class="form-select card__input" data-placeholder="Seleccione una Localidad" required>
              <option></option>
              @foreach ($localidades as $localidad)
              <option value="{{ $localidad->id }}">{{ $localidad->localidad  }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="municipio_id">Municipio</label>
            <select name="municipio_id" id="single-select-field-2" class="form-select card__input" data-placeholder="Seleccione un Municipio o Ciudad">
              <option></option>
              @foreach ($municipios as $municipio)
              <option value="{{ $municipio->id }}">{{ $municipio->ciudadmunicipio  }} </option>
              @endforeach
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="zona_id">Zona</label>
            <select name="zona_id" id="single-select-field-3" class="form-select card__input" data-placeholder="Seleccione una Zona">
              <option></option>
              @foreach ($zonas as $zona)
              <option value="{{ $zona->id }}">{{ $zona->nombre  }}</option>
              @endforeach
            </select>
          </div>

          <div class="card__div">
            <label class="card__label" for="cuit">Cuit</label>
            <input class="card__input" type="text" name="cuit" id="cuit" value="">
          </div>

          <div class="card__div">
            <label class="card__label" for="correo">Email</label>
            <input class="card__input" type="email" name="correo" id="correo" value="" required>
          </div>

          <div class="card__div">
            <label class="card__label" for="marcas">Marcas</label>
            <input class="card__input" type="text" name="marcas" id="marcas" value="">
          </div>

          <div class="card__div">
            <label class="card__label" for="info">Información</label>
            <textarea class="card__input" name="info" id="info" cols="60" rows="5"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary bg-gray-600" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary bg-blue-600">Ingresar</button>
      </form>
    </div>
  </div>
  </div>
  </div>
  {{-- Modal Fin Alta --}}

  {{-- Modal delete --}}
  <div class="modal fade" id="deleteModal" tabindex="-1" data-bs-backdrop="static" role="document">
    <div class=" modal-dialog modal-dialog-centered"">
    <div class=" modal-content">
      <div class="modal-header">
        <div class="modal-title fs-5">Eliminación Cliente Distribución</div>
        <h5 class="modal-title fs-5" aria-labelledby="deleteModalLabel"></h5>
        <button class="btn-close btn-secundary" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form id="formDelete" action="{{ route('representacion.destroy', '1' ) }}" data-action="{{ route('representacion.destroy', '1' ) }}" method="POST">
        <div class="modal-body">
          @csrf
          @method(' DELETE')
          <input type="hidden" name="id" id="id" value="">
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary bg-gray-600" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger bg-red-400">Eliminar</button>
      </div>
    </div>
  </div>
  </div>
  {{-- Modal Fin Delete --}}
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
    console.log(action);

    var modal = $(this)
    modal.find('.modal-body').text('Desea eliminar a ' + razonsocial)
    modal.find('.modal-body value').val(id)
    // modal.find('.modal-form valor').text(id)
  });

</script>
</html>
