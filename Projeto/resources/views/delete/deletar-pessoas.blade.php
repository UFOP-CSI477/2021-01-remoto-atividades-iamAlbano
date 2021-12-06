<!-- Modal Excluir Pessoa-->
@foreach($people as $pessoa)
<div class="modal fade" id="deletar-id-{{$pessoa->person_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar {{$pessoa->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        Tem certeza que quer excluir {{$pessoa->name}} ?
      </div>
      <div class="modal-footer">

        <form action="/pessoas/{{$pessoa->person_id}}" method="POST">
        @csrf
        @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Excluir</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endforeach