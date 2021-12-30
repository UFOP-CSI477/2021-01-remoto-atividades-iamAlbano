<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg p-3 ">
  <div class="container-fluid">

    <a class="navbar-brand" href="/">Controle de vacinação</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link
          @if($active == 1)active @endif"
          aria-current="page" href="/">Início</a>
        </li>

        <li class="nav-item">
          <a class="nav-link
          @if($active == 2)active @endif"
          aria-current="page" href="/geral">Geral</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle
          @if($active == 3)active @endif"
           href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administrativo
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/pessoas">Pessoas</a></li>
            <li><a class="dropdown-item" href="/vacinas">Vacinas</a></li>
            <li><a class="dropdown-item" href="/unidades">Unidades</a></li>  
            <li><a class="dropdown-item" href="/registros">Registros</a></li>    
          </ul>
        </li>  
      </ul>

      <form class="d-flex">
        
    @if(Auth::check())
        <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-primary me-5" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                this.closest('form').submit();"
                >Sair</button>
        </form>
    @endif
    
    @guest
        <a class="btn btn-outline-primary me-3" type="submit" href="/login">Entrar</a>
        <a class="btn btn-primary me-5" type="submit" href="/register">Cadastrar</a>
    @endguest

      </form>
    </div>
  </div>
</nav>