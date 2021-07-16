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
    <a href="{{ route('admin.payments.index') }}"><i class="fas fa-file-invoice-dollar fa-lg"></i><span>Vendas</span></a>
</li>

<li class="{{ Request::is('painel/coupons*') ? 'active' : '' }}">
    <a href="{{ route('admin.coupons.index') }}"><i class="fas fa-ticket-alt fa-lg"></i><span>Cupons</span></a>
</li>
<li class="{{ Request::is('painel/plans*') ? 'active' : '' }}">
    <a href="{{ route('admin.plans.index') }}"><i class="fas fa-file-contract fa-lg"></i><span>Planos</span></a>
</li>

<li class="{{ Request::is('painel/newsletters*') ? 'active' : '' }}">
    <a href="{{ route('admin.newsletters.index') }}"><i class="fa fa-edit"></i><span>Newsletters</span></a>
</li>

<li class="treeview {{ Request::is('painel/contacts*') ? 'active menu-open' : '' }}">
    <a href="#">
        <i class="fas fa-users fa-lg"></i>
        <span>Contatos</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('painel/contacts') ? 'active' : '' }}">
            <a href="{{ route('admin.contacts.index') }}">
                <i class="fas fa-users"></i>
                <span>Contato</span>
            </a>
        </li>
        <li class="{{ Request::is('painel/contacts/business') ? 'active' : '' }}">
            <a href="{{ route('admin.contactsBusiness.index') }}">
                <i class="fas fa-user-graduate"></i>
                <span>Para Empresas</span>
            </a>
        </li>
    </ul>
</li>
