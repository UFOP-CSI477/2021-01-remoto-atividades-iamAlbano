<!-- Modal Categorias-->
<div class="modal fade" id="categories-tab" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="categories-tab">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categories-tab">Categorias de produtos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">

            <form method="POST" id="search-form-category" action="/produtos" class="input-group mb-3">
            @csrf
                            <div class="input-group" >          
                                    <input type="text" id="search-category" name="search-category" class="form-control" placeholder="Procurar categoria" aria-label="Categoria" aria-describedby="basic-addon1">
                            </div>
            </form>
        

            <form method="POST" action="/produtos/update_categories">
            <div class="overflow-scroll" style="height:50vh">
                <table class="table table-categories sticky text-start table-borderless" >
                    <thead class=" sticky-top">

                        <tr>
                            <td colspan='2' class="add-category text-center">
                            <button id="button-add-category">
                            <svg  xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-plus-circle-fill' viewBox='0 0 16 16'>
                            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z'/>
                            </svg>
                            </td></button>
                        </tr>

                        </thead>

                            @csrf
                            <tbody id="new-category">
                        
                            </tbody>

                            <tbody class="categories-table">
                     
                            </tbody>

                </table>
            </div>             
        </div>

                            <div class="modal-footer">
                              <a href="/produtos"><button type="button" class="btn btn-danger">Cancelar</button></a>   
                              <button type="submit" class="btn btn-success">Salvar alterações</button>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </form>



<script>

   var count = 0;
$("#button-add-category").on({

click: function(){
    $("#new-category").append(
    `<tr id='new-category-` +count+ `'>
    <td>
        <input type='text' name='new-`+count+`' id='new-`+count+`' placeholder='Nova categoria' class='form-control' required>
     </td>
     <td class='text-center'>
      <button class='btn btn-outline-danger' onclick='delete_new_category\(` +count+ `\)'>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser-fill" viewBox="0 0 16 16">
        <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm.66 11.34L3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/>
        </svg> 
      </button>
     </td>
     </tr>`
    );

    count ++;
}
});

function delete_new_category(count){
    $("#new-category-"+count).remove();
}



  function pesquisa(){

    var search = $('#search-category').val();
   
    var empty = "filter_off";

    if(search.length > 1){
      var data = {  
        word : search
        }
      
    } else if(search.length <= 1){
      var data = {  
        word : empty
      
        }
    } 

    $.get("{!! url('produtos/table_categories')!!}", data, function(table){
          $(".categories-table").html(table)
      });

  }


  $("#search-form-category").on({

  keyup: function(){
    pesquisa();
  }
  
  });




$(function(){
  $("#search-category").ready(function(){

    var data = {  
      word: "filter_off",
      }

    $.get("{!! url('produtos/table_categories')!!}", data, function(table){
          $(".categories-table").html(table)
      });


  });
});


</script>