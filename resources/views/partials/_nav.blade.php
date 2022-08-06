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


            {{-- <li class="nav-item">
                <a class="nav-link {{ Route::current()->getName() == 'animal.index' ? 'active' : '' }}"
                    href="{{ route('animal.index') }}">Animal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::current()->getName() == 'rescuer.index' ? 'active' : '' }}"
                    href="{{ route('rescuer.index') }}">Rescuer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::current()->getName() == 'employee.index' ? 'active' : '' }}"
                    href="{{ route('employee.index') }}">Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::current()->getName() == 'adopter.index' ? 'active' : '' }}"
                    href="{{ route('adopter.index') }}">Adopter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::current()->getName() == 'disease.index' ? 'active' : '' }}"
                    href="{{ route('disease.index') }}">Disease</a>
            </li>
            <div class="collapse navbar-collapse " id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Donation
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('cashdonation.index') }}">Cash</a></li>
                            <li><a class="dropdown-item" href="{{ route('materialdonation.index') }}">Material</a></li>
                        </ul>
                    </li>
                </ul>
            </div> --}}
            
        </ul>
    </div>
</nav>
