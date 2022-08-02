<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::current()->getName() == 'home' ? 'active' : '' }}"
                    href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
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
                    href="{{ route('adopter.index') }}">Disease</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::current()->getName() == 'donation.index' ? 'active' : '' }}"
                    href="{{ route('adopter.index') }}">Donation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </div>
</nav>
