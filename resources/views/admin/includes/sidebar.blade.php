<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="{{ request()->url() === route('admin.dashboard') ? 'active' : '' }}">
                <a href="{{route("admin.dashboard")}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li class="{{ request()->url() === route('admin.users.index') ? 'active' : '' }}">
                <a href="{{route("admin.users.index")}}"><i class="fa fa-users fa-fw"></i> Users</a>
            </li>
            <li class="{{ request()->url() === route('admin.products.index') ? 'active' : '' }}">
                <a href="{{route("admin.products.index")}}"><i class="fa fa-gift fa-fw"></i> Products</a>
            </li>
            <li class="{{ request()->url() === route('admin.customers.index') ? 'active' : '' }}">
                <a href="{{route("admin.customers.index")}}"><i class="fa fa-male fa-fw"></i> Customers</a>
            </li>
            <li class="{{ request()->url() === route('admin.agents.index') ? 'active' : '' }}">
                <a href="{{route("admin.agents.index")}}"><i class="fa fa-user-circle fa-fw"></i> Agents</a>
            </li>
            <li>
                <a href="{{route("admin.orders.index")}}"><i class="fa fa-truck fa-fw"></i> Orders</a>
            </li>
            <li class="{{ request()->url() === route('admin.options.index') ? 'active' : '' }}">
                <a href="{{route("admin.options.index")}}"><i class="fa fa-list fa-fw"></i> Options</a>
            </li>
            <li class="{{ request()->url() === route('admin.categories.index') ? 'active' : '' }}">
                <a href="{{route("admin.categories.index")}}"><i class="fa fa-list-alt fa-fw"></i> Categories</a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>