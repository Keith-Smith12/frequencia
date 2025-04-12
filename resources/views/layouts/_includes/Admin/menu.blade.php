<div class="col-md-3 left_col">
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="clearfix"></div>

            <!-- Perfil -->
            <div class="profile clearfix">
                <div class="profile_info">
                    <span>Bem-vindo,</span>
                    <h2>Usuário</h2>
                </div>
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-home"></i> <span>Meu Painel</span></a>
                </div>
            </div>
            <!-- /Perfil -->

            <br />

            <!-- Sidebar Menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>Geral</h3>
                    <ul class="nav side-menu">
                        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li><a href="{{ route('exemplo.index') }}"><i class="fa fa-heart"></i> exemplo</a></li>
                        <li><a href="{{ route('tarefa.create') }}">Criar tarefa</a></li>
                        <li><a href="{{ route('tarefa.index') }}">listar tarefas</a></li>
                        <li><a href="{{route('tarefa.purge-view')}}">Tarefas eliminadas</a></li>
                        <li><a href="{{ route('projecto.create') }}">Criar projecto</a></li>
                        <li><a href="{{ route('projecto.index') }}">listar projectos</a></li>
                        <li><a href="{{route('projecto.purge-view')}}">projectos eliminadas</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> Doações</a></li>
                        <li><a href="#"><i class="fa fa-users"></i> Beneficiários</a></li>
                        <li><a href="#"><i class="fa fa-handshake-o"></i> Doadores</a></li>
                        <li><a href="#"><i class="fa fa-bar-chart"></i> Relatórios</a></li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>Configuração</h3>
                    <ul class="nav side-menu">
                        <li><a href="#"><i class="fa fa-cogs"></i> Configurações</a></li>
                        <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                    </ul>
                </div>
            </div>
            <!-- /Sidebar Menu -->

            <!-- Footer do Menu -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Configurações">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Tela Cheia">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Bloquear">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Sair" href=""
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
                <form id="logout-form" action="" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!-- /Footer do Menu -->
        </div>
    </div>

</div>

<!-- Top Navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        <img src="" alt="">
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="">Perfil</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>Configurações</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Ajuda</a></li>
                        <li>
                            <a href=""
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right"></i> Sair
                            </a>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Mensagem curta do sistema...
                                </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a><strong>Ver todas</strong> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /Top Navigation -->
