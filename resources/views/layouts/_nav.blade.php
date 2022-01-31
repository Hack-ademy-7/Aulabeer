<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route ('welcome') }}">Aulabeer</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{  route ('welcome')  }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route ('about')  }}">Sobre nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route ('contacts.create')  }}">Contacta con nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route ('contacts.index')  }}">Contactos</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{  route ('breweries.create')  }}">New Brewery</a>
          </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="{{  route ('breweries.index')  }}">Breweries</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Auth
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @auth
              <li><a class="dropdown-item" href="#">{{auth()->user()->name}}</a></li>
              <li><form action="{{route('logout')}}" method="POST">
                @csrf 
                <button class="dropdown-item" type="submit">Logout</button>
              </form></li>
              @endauth
              @guest
              <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
              @endguest
              
            </ul>
          </li>
      </div>
    </div>
  </nav>