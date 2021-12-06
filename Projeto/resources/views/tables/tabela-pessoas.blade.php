<table class="table table-striped sticky text-start">
  <thead class="table-dark sticky-top">

    <tr>
    <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Contato</th>
      <th scope="col">Categoria</th>
      <th scope="col">Pessoa</th>
      <th scope="col" class="text-center" data-bs-toggle='modal' data-bs-target='#situations'>
        Situação
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
        </svg>
      </th>
      <th scope="col" class="text-center">Excluir</th>
    </tr>

  </thead>

  <tbody class="people-table">

  

    
  </tbody>
</table>

<div class="spinner-border" style="margin-top: 15vh"role="status">
</div>

<script>

function badge() {

  count = 4;

  console.log(count);
  if($('#search-person').val().length < 1){ count-=1; } 

  if($('#search-category option:selected').text() === 'Categoria'){ count-=1; } 

  if($('#search-type option:selected').text() === 'Tipo'){ count-=1; }

  if($('#search-blacklist').is(':checked') === false ){ count-=1; } 
   
  
  if(count > 0){
    $( "#badge" ).removeClass( "visually-hidden" );
    $("#badge").html(count);
  } else {
    $( "#badge" ).addClass( "visually-hidden" );
  }
}



  function pesquisa(){
    var search = $('#search-person').val();
    var category = $('#search-category option:selected').text();
    var type = $('#search-type option:selected').text();
    var blacklist = $('#search-blacklist').is(':checked');
    
    var empty = "filter_off";

    if(search.length > 1){
      var data = {  
        word : search,
        category : category,
        type : type,
        blacklist: blacklist
        }
      
    } else if(search.length <= 1){
      var data = {  
        word : search,
        category : category,
        type : type,
        blacklist: blacklist
        }
    } 

    $.get("{!! url('pessoas/table')!!}", data, function(table){
          $(".people-table").html(table)
          $( ".spinner-border" ).addClass( "visually-hidden" );
      });

  }


  $("#search-form").on({
    change: function(){
    pesquisa();
    badge();
  },

  keyup: function(){
    pesquisa();
    badge();
  }
  
  });




$(function(){
  $("#search-person").ready(function(){

    var data = {  
      word: "filter_off",
      }

    $.get("{!! url('pessoas/table')!!}", data, function(table){
          $(".people-table").html(table)
          $( ".spinner-border" ).addClass( "visually-hidden" );
      });


  });
});


</script>