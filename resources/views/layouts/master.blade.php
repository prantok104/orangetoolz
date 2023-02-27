{{-- Header include --}}
@include('includes.header')
{{-- Warpper area --}}
<div id="orange-wrapper-area">
    <div class="orange-wrapper-area-start">
        <aside class="orange-sidebar-area">
            @include('includes.sidebar')
        </aside>
        <main class="orange-main-area-start">
            <div class="p-4 orange-margin-top">
                @yield('content')
            </div>
        </main>
    </div>
</div>
{{-- Footer include --}}
@include('includes.footer')
