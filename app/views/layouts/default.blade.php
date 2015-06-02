<!doctype html>
<html>
@include('includes.head')

<body>


<div class="testa">
    <div class="wrapper">
        <div class="logo">
            <a href="/" class="logo"></a>
        </div>
        @include('includes.login')
    </div>
</div>
@include('includes.menu')

<div id="wrapper">
    <div id="main">

    @yield('content')

    </div> <!-- /main -->


    @include('includes.footer')

    <div class="clear"></div>

</div> <!-- /wrapper -->

@include('includes.foot_script')


</body>
</html>