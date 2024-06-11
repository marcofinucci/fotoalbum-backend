<div class="my-logo text-secondary-emphasis">PHOTO ALBUM</div>

<ul class="nav flex-column my-nav-general">
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : ''}}" href="{{ route('dashboard')}}">
      @if(request()->routeIs('dashboard'))
      <i class="bi bi-house-fill"></i>
      @else
      <i class="bi bi-house"></i>
      @endif
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('photos.index') ? 'active' : ''}}" href="{{ route('photos.index')}}">
      @if(request()->routeIs('photos.index'))
      <i class="bi bi-image-fill"></i>
      @else
      <i class="bi bi-image"></i>
      @endif
      <span>Le tue foto</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('photos.create') ? 'active' : ''}}" href="{{ route('photos.create')}}">
      @if(request()->routeIs('photos.create'))
      <i class="bi bi-plus-circle-fill"></i>
      @else
      <i class="bi bi-plus-circle"></i>
      @endif
      <span>Aggiungi foto</span>
    </a>
  </li>
</ul>

<div class="my-profile small">Benvenuto <strong>{{ Auth::user()->name }}</strong></div>

<ul class="nav flex-column my-nav-settings">
  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : ''}}" href="{{ route('profile.edit') }}">
      @if(request()->routeIs('profile.edit'))
      <i class="bi bi-person-fill"></i>
      @else
      <i class="bi bi-person"></i>
      @endif
      <span>Profilo</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="bi bi-box-arrow-left"></i>
      <span>Logout</span>
    </a>
  </li>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
</ul>