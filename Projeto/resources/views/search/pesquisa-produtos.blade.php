
<form method="POST" id="search-product-form" action="" class="search input-group mb-1">
    

    <div class="filter row p-14" >
        <div class=" d-flex">                                             
            <div class="col-md-6 me-3">              
                <div class="input-group mb-3 ">
            
                    <span class="input-group-text bg-dark" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </span>
                    <input type="text" id="search-product" name="search-product" class="form-control" placeholder="Procurar produto" aria-label="Produto" aria-describedby="basic-addon1">
                </div>
            </div>
                <div class="col-md-5 me-3">                    
                    <select id="search-category" name="search-category" class="form-select">

                        <option value=" " selected>Categoria</option>
                            @foreach($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="col-md-4 me-3">                    
                    <select id="search-situation" name="search-situation" class="form-select">

                        <option selected>Situação</option>         
                        <option>Baixo estoque</option>
                        <option>Esgotado</option>
                    </select>
                </div>
                
                
                
            
                               
            
        </div> 
    </div>

</form>
             

