<div class="orange-iconic">

</div>
<div class="orange-main-sidebar">
    <div class="orange-sidebar-top-area">
        <a href="" class="text-uppercase title">{{ env('APP_NAME') }}</a>
    </div>
    <nav class="orange-sidemenu">
        <ul class="orange-sidebar-menu">
            <li>
                <a href="" class=""><span><i class="fa-solid fa-home mr-2"></i> Dashboard</span></a>
            </li>

            <li>
                <a href="" class=""><span><i class="fa-solid fa-home mr-2"></i> Categories</span></a>
            </li>

            <li>
                <a href="" class=""><span><i class="fa-solid fa-power-off mr-2"></i>System
                        Restart</span></a>
            </li>

            <li>
                <a href="{{ route('logout') }}" class=""><span><i
                            class="fa-solid fa-arrow-right-from-bracket mr-2"></i>Logout</span></a>
            </li>
        </ul>
    </nav>
</div>
