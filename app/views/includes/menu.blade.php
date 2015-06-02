<!-- menu -->
<nav>
    <div class="wrapper">

        <a class="toggleMenu" href="#"></a>
        <ul class="nav">
            <li  class="test">
                <a href="#" class="parent">HOME</a>

            </li>
            @if(Auth::check())
            <li>
                <a href="#" class="parent">NEGOZIO</a>
            </li>
            @endif
        </ul>
    </div><!-- / nav -->
</nav>
<!-- / menu -->