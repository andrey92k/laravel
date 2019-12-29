
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('staff.index') }}">Staffs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('import.index') }}">Import</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Staff department
      </a>
      <div class="dropdown-menu">
      	@foreach ($department as $departme)
        <a class="dropdown-item" href="{{ route('staff.index') }}/{{ $departme->slug }}">{{ $departme->title }}</a>
        @endforeach
      </div>
    </li>
  </ul>
</nav>
