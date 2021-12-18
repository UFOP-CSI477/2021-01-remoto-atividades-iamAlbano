<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet"  crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Controle de protocolos</title>
  </head>
  <body class="bg bg-secondary">

    @include('layouts.menu', ['active' => $active])

    @if(Session::has('success'))
      @include('alerts.success')
    @endif

    
    <div class=" 
    conteudo
    @if($active == 3 || $active == 4)
      conteudo-lg
    @else
      conteudo-sm
    @endif
    bg bg-light position-absolute top-50 start-50 translate-middle border border-5 shadow-lg overflow-scroll">
      @yield('content')
    </div>

  
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
  </body>
  
</html>