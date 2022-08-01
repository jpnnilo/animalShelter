<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="/">Home</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="{{ route('animal.index') }}">Animal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('rescuer.index') }}">Rescuer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Employee</a>
          </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
    </div>
  </nav>