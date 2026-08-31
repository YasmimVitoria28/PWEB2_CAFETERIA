<div class="text-center mb-4">
    <h5>Grão de Ouro</h5>
    <span class="badge bg-warning text-dark">Administrador</span>
</div>
<hr>
<ul class="nav flex-column gap-2">
    <li class="nav-item">
        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active-coffee' : '' }} rounded p-2">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/post') }}" class="nav-link {{ request()->is('post*') ? 'active-coffee' : '' }} rounded p-2">
            <i class="bi bi-file-earmark-post me-2"></i> Pedidos
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/produto') }}" class="nav-link {{ request()->is('produto*') ? 'active-coffee' : '' }} rounded p-2">
            <i class="bi bi-cup-hot me-2"></i> Produtos
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/usuario') }}" class="nav-link {{ request()->is('usuario*') ? 'active-coffee' : '' }} rounded p-2">
            <i class="bi bi-people me-2"></i> Usuários
        </a>
    </li>
</ul>
<hr>