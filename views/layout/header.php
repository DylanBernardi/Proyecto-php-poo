<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
</head>

<body>

    <div id="container">
        <!--cabecera-->
        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="<?=base_url?>">
                    Tienda de camisetas
                </a>
            </div>
        </header>
        <?php $categorias = Utils::showCategorias(); ?>
        <!--Menu-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="">Inicio</a>
                </li>
                <?php while ($cat = $categorias->fetch_object()) : ?>
                    <li>
                        <a href="#"><?= $cat->nombre ?></a>
                    </li>
                <?php endwhile; ?>


            </ul>
        </nav>
        <!--Lateral-->
        <div id="content">