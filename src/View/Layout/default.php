<?php
/**
 * @var \App\Resources\View $this;
 */
use \App\Resources\Session;
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <title>Pandora Gerenciamento de Buffet</title>

        <link rel="icon" type="image/png" href="<?= $this->img('favicon.png') ?>" />

        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

        <!-- Bootstrap core CSS -->
        <?= $this->css('bootstrap.min.css') ?>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <?= $this->css('dashboard.css') ?>

        <?= $this->js('jquery-3.3.1.min.js') ?>
        <?= $this->js('bootstrap.min.js') ?>
        <?= $this->js('bootstrap-notify.min.js') ?>
        <?= $this->js('dashboard.js') ?>
    </head>
    <body>
    <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">PanGB</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light"><?= Session::get('Auth.User')->name ?>&nbsp;&nbsp;</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/">
                                <i class="far fa-gem"></i>
                                Ínicio <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-calendar-alt"></i>
                                Reservas
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-handshake"></i>
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-map-marker-alt"></i>
                                Espaços
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-sitemap"></i>
                                Itens
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-concierge-bell"></i>
                                Serviços
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users">
                                <i class="fa fa-users"></i>
                                Usuários
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">
                                <i class="fas fa-sign-out-alt"></i>
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-4">
                <div class="row">
                    <?php $this->displayMessages(); ?>
                </div>
                <div class="row">
                    <?php $this->content(); ?>
                </div>
            </main>

        </div>
    </div>


    </body>
</html>