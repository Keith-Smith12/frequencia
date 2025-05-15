<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{'assets_fo/'}}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Registro de Usuário</title>

    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets_fo/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets_fo/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets_fo/vendor/css/core.css')}}" class="template-customizer-core-css'}}" />
    <link rel="stylesheet" href="{{asset('assets_fo/vendor/css/theme-default.css')}}" class="template-customizer-theme-css'}}" />
    <link rel="stylesheet" href="{{asset('assets_fo/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets_fo/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('assets_fo/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('assets_fo/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <script src="{{asset('assets_fo/js/config.js')}}"></script>
  </head>

  <body>
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <!-- SVG content remains the same -->
                    </svg>
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">SGF</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Cadastro de Usuário</h4>
              <p class="mb-4">Preencha os campos abaixo para criar uma conta</p>

              <form class="mb-3" action="{{route('auth.register')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="vc_nome" class="form-label">Nome Completo</label>
                  <input
                    type="text"
                    class="form-control"
                    id="vc_nome"
                    name="vc_nome"
                    placeholder="Digite seu nome completo"
                    required
                    autofocus
                  />
                </div>
                
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    placeholder="Digite seu email" 
                    required
                  />
                </div>
                
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Senha</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                
                <div class="mb-3">
                  <label for="vc_classe" class="form-label">Classe</label>
                  <select class="form-select" id="vc_classe" name="vc_classe" required>
                    <option value="">Selecione uma classe</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuário</option>
                    <!-- Adicione outras opções conforme necessário -->
                  </select>
                </div>
                @auth
                <div class="mb-3">
                  <label for="vc_tipo" class="form-label">Tipo</label>
                  <select class="form-select" id="vc_tipo" name="vc_tipo" required>
                    <option value="">Selecione um tipo</option>
                    <option value="admin">Administrador</option>
                    <option value="normal">Normal</option>
                    <!-- Adicione outras opções conforme necessário -->
                  </select>
                </div>
                @endauth
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                    <label class="form-check-label" for="terms-conditions">
                      Eu concordo com os
                      <a href="javascript:void(0);">termos de uso e política de privacidade</a>
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Cadastrar</button>
              </form>

              <p class="text-center">
                <span>Já possui uma conta?</span>
                <a href="{{route('login')}}">
                  <span>Faça login</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <script src="{{asset('assets_fo/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets_fo/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets_fo/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets_fo/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets_fo/vendor/js/menu.js')}}"></script>
    <script src="{{asset('assets_fo/js/main.js')}}"></script>
  </body>
</html>