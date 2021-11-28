<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Exercício de PHP</title>
  </head>
  <?php
    $nome = 'Guilherme';
    $idade = '21';
    $matricula = '19.1.8055';
    $curso = 'Sistemas de informação';
  ?>
  <body class="bg-dark">
      
      <div id="box" class="position-absolute top-50 start-50 translate-middle shadow-lg p-3 mb-5 bg-body rounded ">
          
          <div class="container">
            <p>Exercício 01 - PHP</p>
            <hr>
            
            <div class="row mb-3">
              
                <p id="nome">Nome: <?=$nome?></p>
            </div>

            <div class="row mb-3">
                <p id="idade">Idade: <?=$idade?></p>
            </div>

            <div class="row mb-3">            
                <p id="matricula">Matricula: <?=$matricula?></p>
            </div>

            <div class="row mb-3">    
                <p id="curso">Curso: <?=$curso?></p>
            </div>
        
           
        </div>
        
    </div>


</body>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
  </body>
</html>