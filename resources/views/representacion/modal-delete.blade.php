<div class="modal fade" id="modal-delete-{{ $representacion->representacion_id }}">

  <div class="modal-dialog">
    <form action="{{ route('representacion.destroy', $representacion->id) }}" method="post">
      @csrf
      @method('DELETE')
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar cliente</h4>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Desea eliminar el cliente {{ $representacion->razonsocial }}</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-outline-light">Eliminar</button>
        </div>
      </div>
    </form>
  </div>
</div>
