<!-- Modal Excluir venda-->
@foreach($sellings as $venda)
<div class="modal fade" id="deletar-id-{{$venda->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar venda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        Tem certeza que quer excluir a venda de número {{$venda->id}}?
      </div>
      <div class="modal-footer">

        <form action="/vendas/{{$venda->id}}" method="POST">
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Excluir</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endforeach