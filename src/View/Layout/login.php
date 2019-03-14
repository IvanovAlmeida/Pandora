<?php
/**
 * @var \App\Resources\View $this
 */
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


    <!-- Custom styles for this template -->


    <?= $this->js('jquery-3.3.1.min.js') ?>
    <?= $this->js('bootstrap.min.js') ?>
    <?= $this->js('bootstrap-notify.min.js') ?>

</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <?php $this->displayMessages(); ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <!--início do card onde guardara o conteúdo de login-->
                <div class="card border-primary " style="margin-top: 90px;">
                    <div class="card-header text-center">
                        Pandora - Gerenciamente de Buffet
                    </div>
                    <div class="card-body text-primary">
                        <div class="row">

                            <div class="col-sm-6 text-center">
                                <img src="<?= $this->img('logo.jpg') ?>" height="350" width="350">
                            </div>
                            <div class="col-sm-6">
                                <?php $this->content(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>



</body>
</html>

