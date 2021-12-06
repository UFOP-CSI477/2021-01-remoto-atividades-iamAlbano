<table class="table table-striped sticky text-start">
  <thead class="table-dark sticky-top">

    <tr>
    <th scope="col">nº</th>
      <th scope="col">Nome</th>
      <th scope="col">Tipo unitário</th> 
      <th scope="col" class="text-center">Excluir</th>
    </tr>

  </thead>

  <tbody class="inputs-table">

  

    
  </tbody>
</table>

<script>

function badge() {

  count = 1;

  if($('#search-input').val().length < 1){ count-=1; } 
  
  
  if(count > 0){
    $( "#badge" ).removeClass( "visually-hidden" );
    $("#badge").html(count);
  } else {
    $( "#badge" ).addClass( "visually-hidden" );
  }
}



  function searchinput(){
    var search = $('#search-input').val();
    

    if(search.length > 1){
      var data = {  
        word : search,
    
        }
      
    } else if(search.length <= 1){
      var data = {  
        word : search,
        
        }
    } 

    $.get("{!! url('compras/table_inputs')!!}", data, function(table){
          $(".inputs-table").html(table)
      });

  }


  $("#search-input-form").on({
    change: function(){
    searchinput();
    badge();
  },

  keyup: function(){
    searchinput();
    badge();
  }
  
  });




$(function(){
  $("#search-input").ready(function(){

    var data = {  
      word: "filter_off",
      }

    $.get("{!! url('compras/table_inputs')!!}", data, function(table){
          $(".inputs-table").html(table)
      });


  });
});


</script>