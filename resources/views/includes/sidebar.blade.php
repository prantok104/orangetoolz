<div class="orange-iconic">

</div>
<div class="orange-main-sidebar">
    <div class="orange-sidebar-top-area">
        <a href="{{ route('dashboard') }}" class="text-uppercase title">{{ env('APP_NAME') }}</a>
    </div>
    <nav class="orange-sidemenu">
        <div id="menu2"></div>
        <ul class="orange-sidebar-menu" id="menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><span><i
                            class="fa-solid fa-home mr-2"></i> Dashboard</span></a>
            </li>

            <li>
                <a href="{{ route('todo.index') }}" class="{{ request()->routeIs('todo.*') ? 'active' : '' }}"><span><i
                            class="fa-solid fa-list mr-2"></i> Todo Lists</span></a>
            </li>

            <li>
                <a href="{{ route('categories.index') }}"
                    class="{{ request()->routeIs('categories.*') ? 'active' : '' }}"><span><i
                            class="fa-solid fa-table-cells-large mr-2"></i> Categories</span></a>
            </li>

            <li>
                <a href="{{ route('tags.index') }}" class="{{ request()->routeIs('tags.*') ? 'active' : '' }}"><span><i
                            class="fa-solid fa-tags mr-2"></i> Tags</span></a>
            </li>

            <li>
                <a href="{{ route('users.index') }}"
                    class="{{ request()->routeIs('users.*') ? 'active' : '' }}"><span><i
                            class="fa-solid fa-user mr-2"></i> Connectors</span></a>
            </li>

            <li>
                <a href="{{ route('trash.index') }}"
                    class="{{ request()->routeIs('trash.*') ? 'active' : '' }}"><span><i
                            class="fa-solid fa-trash mr-2"></i> Trashes</span></a>
            </li>

            <li>
                <a href="{{ route('system.restart') }}" class=""><span><i
                            class="fa-solid fa-power-off mr-2"></i>System
                        Restart</span></a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button><span><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i>Logout</span></button>
                </form>
            </li>
        </ul>
    </nav>
</div>
