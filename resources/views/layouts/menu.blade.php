<li class="treeview {{ Request::is('painel/users*') ? 'active menu-open' : '' }}">
    <a href="#">
        <i class="fas fa-users fa-lg"></i>
        <span>Alunos</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('painel/users') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i>
                <span>Todos</span>
            </a>
        </li>
        <li class="{{ Request::is('painel/users/registered') ? 'active' : '' }}">
            <a href="{{ route('admin.users.registered') }}">
                <i class="fas fa-user-graduate"></i>
                <span>Matriculados</span>
            </a>
        </li>
        <li class="{{ Request::is('painel/users/unregistered') ? 'active' : '' }}">
            <a href="{{ route('admin.users.unregistered') }}">
                <i class="fa fa-user-slash"></i>
                <span>Não Matriculados</span>
            </a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('painel/payments*') ? 'active' : '' }}">
    <a href="{{ route('admin.payments.index') }}"><i class="fa fa-file-invoice-dollar fa-lg"></i><span>Vendas</span></a>
</li>

