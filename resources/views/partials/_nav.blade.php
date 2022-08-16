<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == 'rescuer.list' ? 'active' : '' }}" href="{{ route('rescuer.list') }}">Rescuers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == 'adopter.list' ? 'active' : '' }}" href="{{ route('adopter.list') }}">Adopters</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName() == 'animal.list' ? 'active' : '' }}" href="{{ route('animal.list') }}">Animals</a>
          </li>
          @auth
            
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin   
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('employee.index') }}">Employee</a></li>
                        <li><a class="dropdown-item" href="{{ route('disease.index') }}">Disease</a> </li>
                        <li><a class="dropdown-item" href="{{ route('cashdonation.index') }}">Cash Donation</a></li>
                        <li><a class="dropdown-item" href="{{ route('materialdonation.index') }}">Material Donation</a></li>
                    </ul>
                </li>
            </ul>
          
        

        </ul>
        <ul class="navbar-nav">
          <li class="nav-item" style="color:white;"> <h6 style="margin-top:11px;"> Welcome! {{ auth()->user()->name }} </h6></li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
            
                <button class="btn btn-dark" type="submit">Logout</button>
            
              </form>
            </li> 
          @else
          
        </ul>
          <ul class="navbar-nav">
            <li class="navbar-item">
              <a class="nav-link float-end" href="{{ route('user.loginView') }}">Login</a>
            </li>
          
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  