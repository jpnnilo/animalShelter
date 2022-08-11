<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav container">

            <li class="nav-item">
                <a class="nav-link {{ Route::current()->getName() == 'home' ? 'active' : '' }}"
                    href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link {{ Route::current()->getName() == 'rescuer.list' ? 'active' : '' }}" href="{{ route('rescuer.list') }}">Rescuers</a></li>
            <li class="nav-item"><a class="nav-link {{ Route::current()->getName() == 'adopter.list' ? 'active' : '' }}" href="{{ route('adopter.list') }}">Adopters</a></li>
            <li class="nav-item"><a class="nav-link {{ Route::current()->getName() == 'animal.list' ? 'active' : '' }}" href="{{ route('animal.list') }}">Animals</a></li>

            {{-- need to add login for adminstrator --}}
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
            
            <li class="nav-item"><a class="nav-link {{ Route::current()->getName() == 'user.register' ? 'active' : '' }}" href="{{ route('user.register') }}">Register</a></li>
            <li class="nav-item"><a class="nav-link {{ Route::current()->getName() == 'user.login' ? 'active' : '' }}" href="{{ route('user.login') }}">Login</a></li>
            
        </ul>
    </div>
</nav>
