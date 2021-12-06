<!-- Modal Excluir category-->
@foreach($categories as $category)
<div class="modal fade" id="delete-category-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete-category-{{$category->id}}Label">Deletar {{$category->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        Tem certeza que quer excluir a categoria {{$category->name}} ?
      </div>
      <div class="modal-footer">

          <button class="btn btn-outline-success" data-bs-target="#categories-tab" data-bs-toggle="modal">Voltar</button>
          
          <form action="/produtos/destroy_category/{{$category->id}}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Excluir</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endforeach