<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Controle de protocolos</a>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Geral</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tipos de protocolos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/tipos/create">Cadastrar</a></li>
            <li><a class="dropdown-item" href="#">Pesquisar</a></li>
            <li><a class="dropdown-item" href="/">Visualizar todos</a></li>      
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Protocolos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Cadastrar</a></li>
            <li><a class="dropdown-item" href="#">Pesquisar</a></li>
            <li><a class="dropdown-item" href="#">Visualizar todos</a></li> 
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Relatórios
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/relatorio-usuarios">Usuários</a></li>
            <li><a class="dropdown-item" href="/register">Protocolos</a></li>    
          </ul>
        </li>

       
        
      </ul>
      <form class="d-flex align-middle">

        @if(Auth::check())
          <a class="btn btn-outline-primary me-5" href="/logout" role="button">Sair</a>
          @else
          <a class="btn btn-outline-primary me-2" href="/login" role="button">Login</a>
          <a class="btn btn-primary me-5" href="/register" role="button">Registrar</a>
        @endif

      </form>
    </div>
  </div>
</nav>