<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        

        <!-- Css do Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <!-- CSS da Aplicação -->
        <link rel="stylesheet" href="/css/styles.css">

        <!-- JS da aplicação -->
        <script src="/js/scripts.js"></script>
        
    <head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light p-2">
               <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/hdcevents_logo.svg" alt="HDC Events">
                    </a>
                    <ul class="navbar-nav">
                        
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link text-success fw-bold bg-dark rounded">Convidado</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-warning fw-bold bg-dark rounded">{{Auth::user()->name}}</a>
                            </li>
                        @endif
                        
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/users" class="nav-link">Criar Usuário</a>
                        </li> 
                        @auth
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus Eventos</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <!-- event.preventDefault() = evita que seja executado o evento do botão, pq a intenção não é ir para um link -->
                                <!-- this.closets('form').submit(); = vai achar o formulário mais perto e vai fazer o envio desse formulário de logout -->
                                <a href="/logout"
                                class="nav-link"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                >
                                Sair
                                </a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest
                    </ul>
                </div> 
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message')}}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
    
    <footer>
        HDC Events &copy; 2020 - v1
    </footer>

    @yield('scripts')
    
    <!-- icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    
    @include('sweetalert::alert')
    </body>
</html>

