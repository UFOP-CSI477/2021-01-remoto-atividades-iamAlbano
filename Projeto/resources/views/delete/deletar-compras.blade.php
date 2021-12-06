<!-- Modal Excluir compra-->
@foreach($buys as $compra)
<div class="modal fade" id="deletar-id-{{$compra->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar compra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        Tem certeza que quer excluir a compra de número {{$compra->id}}?
      </div>
      <div class="modal-footer">

        <form action="/compras/{{$compra->id}}" method="POST">
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Excluir</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endforeach