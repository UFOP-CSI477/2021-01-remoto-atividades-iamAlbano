<?php

    require '../vendor/autoload.php';

    use App\Controllers\ProdutoController;
    use App\Models\Estado;
    use App\Models\Produto;
    use App\Database\Connection;
    use App\Database\AdapterSQLite;

    $produto = new ProdutoController();

    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Exercício de formulários</title>
    <style>
        #box {
            width: 50em;
        }

        .divider {
            color: rgba(255, 255, 255, .9);
            padding-bottom: 15pt;
        }

        .btn-submit {
            width: 10em;
        }
    </style>
  </head>
  
  <body class="bg-dark">
      
      <div id="box" class="position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body rounded ">
        
      <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                    Cadastrar</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    Visualizar</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action="productInsert.php" method="post">
                <div class="container">                     
                <div class="row mb-2">
                    <hr class="divider">
                    <div class="col">
                        <label for="nome" class="form-label">Nome</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                    </div>

                    <div class="col">
                        <label for="unidade" class="form-label">Tipo de medida</label>
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" id="unidade" name="unidade">
                            <option value="un" selected>unidade</option>
                            <option value="cm">centímetro</option>
                            <option value="m">metro</option>
                            <option value="l">litros</option>
                            <option value="g">gramas</option>
                            <option value="kg">quilo</option>
                            </select>
                        </div>
                    </div>
            
          
      </div>

        
      
      <div class="row justify-content-center">
          <button type="submit" class="btn btn-dark btn-submit">Salvar</button>
      </div>
  </div>
</form>
  
            </div>




            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <?php $produto->exibeTabela()?>
        </div>
        </div>

          
        
    </div>


</body>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>