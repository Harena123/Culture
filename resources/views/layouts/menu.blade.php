
<li class="nav-item">
    <a href="{{ route('villes.index') }}" class="nav-link {{ Request::is('villes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Villes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('etats.index') }}" class="nav-link {{ Request::is('etats*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Etats</p>
    </a>
</li>
