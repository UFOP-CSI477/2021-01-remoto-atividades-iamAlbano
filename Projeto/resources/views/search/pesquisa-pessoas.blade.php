
<form method="POST" id="search-form" action="" class="search input-group mb-1">
    

        <div class="filter row p-14" >
            <div class=" d-flex">                                             
            <div class="col-md-4 me-3">  
                            
                <div class="input-group mb-3 ">
                    <span class="input-group-text bg-dark" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        </span>
                        <input type="text" id="search-person" name="search-person" class="form-control" placeholder="Procurar por nome" aria-label="Nome" aria-describedby="basic-addon1">
                    </div>
            </div>
                                   
                <div class="col-md-3 me-3">                    
                        <select id="search-category" name="search-category" class="form-select">

                            <option value=" " selected>Categoria</option>
                            <option value="Administrador" >Administrador</option>
                            <option value="Cliente" >Cliente</option>
                            <option value="Fornecedor" >Fornecedor</option>
                            <option value="Vendedor" >Vendedor</option>
                        </select>
                </div>

                <div class="col-md-2 me-3">
                                    
                    <select id="search-type" name="search-type" class="form-select">
                        <option value=" " selected>Tipo</option>
                        <option value="Física" >Física</option>
                        <option value="Jurídica" >Jurídica</option>
                    </select>
                
                </div>

                

                <div class="form-check form-switch col-md-5 d-flex bd-highlight mb-3">


                    <div class="p-2 " style="margin-right: 35px;">
                        <label class="form-check-label" for="search-blacklist">
                            Blacklist
                        </label>
                        <input style="cursor: pointer;" class="form-check-input" type="checkbox" id="search-blacklist" role="switch">
                    </div>   

                    
                </div>
            </div> 
        </div>
    
</form>
                 

