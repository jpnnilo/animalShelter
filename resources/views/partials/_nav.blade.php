<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav container">

        
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link {{ Route::current()->getName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <a class="nav-link {{ Route::current()->getName() == 'rescuer.list' ? 'active' : '' }}" href="{{ route('rescuer.list') }}">Rescuers</a>
                <a class="nav-link {{ Route::current()->getName() == 'adopter.list' ? 'active' : '' }}" href="{{ route('adopter.list') }}">Adopters</a>
                <a class="nav-link {{ Route::current()->getName() == 'animal.list' ? 'active' : '' }}" href="{{ route('animal.list') }}">Animals</a>
            
              </div>
            </div>

            @auth
            <div class="collapse navbar-collapse " id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin   
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('animal.index') }}">Animal</a></li>
                            <li><a class="dropdown-item" href="{{ route('rescuer.index') }}">Rescuer</a></li>
                            <li><a class="dropdown-item" href="{{ route('employee.index') }}">Employee</a></li>
                            <li><a class="dropdown-item" href="{{ route('adopter.index') }}">Adopter</a></li>
                            <li><a class="dropdown-item" href="{{ route('disease.index') }}">Disease</a> </li>
                            <li><a class="dropdown-item" href="{{ route('cashdonation.index') }}">Cash Donation</a></li>
                            <li><a class="dropdown-item" href="{{ route('materialdonation.index') }}">Material Donation</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

                <li class="nav-item" style="color:white;"> Welcome! {{ auth()->user()->name }} </li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                <li class="nav-item">
                    <button class="btn btn-dark" type="submit">Logout</button>
                </li>
                </form>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('user.registerView') }}">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.loginView') }}">Login</a></li>
            @endauth
            
        </ul>
    </div>
</nav>
