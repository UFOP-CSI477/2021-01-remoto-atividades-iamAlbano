<!-- Modal Excluir produto-->
@foreach($products as $produto)
<div class="modal fade" id="deletar-id-{{$produto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar {{$produto->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        Tem certeza que quer excluir {{$produto->name}} ?
      </div>
      <div class="modal-footer">

        <form action="/produtos/{{$produto->id}}" method="POST">
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Excluir</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endforeach