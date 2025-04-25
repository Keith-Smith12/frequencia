<!DOCTYPE html>
<html lang="pt-AO">
@include('layouts._includes.Admin.head')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- menu -->
            @include('layouts._includes.Admin.menu')
            <!-- /menu -->

            @yield('conteudo')

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    @include('layouts._includes.Admin.footer')
</body>

</html>
