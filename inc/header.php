<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo BASEURL?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>css/font-awesome.min.css">
    <title>UniExpress</title>
    <style>
        body{
            padding-top: 65px;
            padding-bottom: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="<?php echo BASEURL;?>index.php">UniExpress</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASEURL;?>views/Agenda/index.php">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASEURL;?>views/Veiculo/index.php">Veículos</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="container" id="corpo">