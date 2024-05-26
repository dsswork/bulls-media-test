<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Parse Google Sheets</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-header">GENERAL</li>
                        <li class="nav-item">
                            <a href="{{ route('admin.connections.index') }}"
                               class="nav-link @if(request()->routeIs('admin.connections.index')) active @endif">
                                <i class="fas fa-key nav-icon"></i>
                                <p>Connections</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.tables.index') }}"
                               class="nav-link @if(request()->routeIs('admin.tables.index')) active @endif">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.schemas.index') }}"
                               class="nav-link @if(request()->routeIs('admin.schemas.index')) active @endif">
                                <i class="fas fa-columns nav-icon"></i>
                                <p>Schemas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.dataTables.index') }}"
                               class="nav-link @if(request()->routeIs('admin.dataTables.index')) active @endif">
                                <i class="fas fa-database nav-icon"></i>
                                <p>Parsing</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

