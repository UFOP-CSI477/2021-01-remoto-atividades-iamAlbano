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
    </style>
  </head>
  
  <body class="bg-dark">
      
      <div id="box" class="position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body rounded ">
          
          <form action="/2021-01-remoto-atividades-iamAlbano/Atividades/exercicios/exercício-06/validar.php" method="post">

          <div class="container">

                <p>Formulário</p>
                <hr>           
                <div class="row mb-2">

                    <div class="col">
                        <label for="nome" class="form-label">Nome</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                    </div>

                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
             
                    
                    <div class="col col-2">
                        <label for="idade" class="form-label">Idade</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="idade" name="idade" min="0">
                        </div>
                    </div>
                    
                </div>

                <div class="row mb-2">

                    <div class="col">
                        <label for="curso" class="form-label">Curso</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="curso" name="curso">
                        </div>
                    </div>
                    
                    
                    <div class="col">
                        <label for="matricula" class="form-label">Matrícula</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="matricula" name="matricula">
                        </div>
                    </div>
                    
                    <div class="col">
                        <label for="universidade" class="form-label">Universidade</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="universidade" name="universidade">
                        </div>
                    </div>
                    
                </div>  
                
                <div class="row">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>
            </div>
          </form>
            
        
    </div>


</body>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>