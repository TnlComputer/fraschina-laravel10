  <div class="modal fade" id="deleteModal" tabindex="-1" data-bs-backdrop="static" role="document">
    <div class=" modal-dialog modal-dialog-centered"">
    <div class=" modal-content">
      <div class="modal-header">
        <div class="modal-title fs-5">Eliminación Cliente Distribución</div>
        <h5 class="modal-title fs-5" aria-labelledby="deleteModalLabel"></h5>
        <button class="btn-close btn-secundary" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <form id="formDelete" action="{{ route('representacion.destroy', '1' ) }}" data-action="{{ route('representacion.destroy', '1' ) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method(' DELETE')
        <div class="modal-body">
          {{-- <input type="hidden" name="id" id="id"> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary bg-gray-600" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger bg-red-400">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
  </div>
