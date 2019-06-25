<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Berserk Store</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ce99bfb64c.js"></script>
</head>

<body>
    <div id="container">

        <!--cabezera-->

        <header id="header">
            <div id="logo">
                <img id="berk" src="<?=base_url?>assets/img/logo.png" alt="berserk logo">
                <a href="<?=base_url?>index.php" id="home">Berserk Store 愁い</a>
                <?php $stats = Utils::statsCarrito(); ?>
                <!--
                <a id="caricon" href="<?=base_url?>carrito/index"><?=$stats['count']?><i class="fas fa-shopping-cart"></i> Total:<?=$stats['total']?></a> -->
            </div>
        </header>


        <!--menu-->
        <?php $categorias = Utils::showCategories(); ?>
        <nav id="menu">
            <ul>
                <li><a id="primero" href="<?=base_url?>"><i class="fas fa-home"></i></a></li>
               <?php while($cat = $categorias->fetch_object()): ?> 
                    
                <li><a class="navo" href="<?=base_url?>categorias/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a></li>
                
                <?php endwhile;?>
                
            </ul>
        </nav>


        <!--DIV PRINCIPAL-->

        <div id="content">