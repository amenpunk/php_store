<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Berserk Store</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <div id="container">

        <!--cabezera-->

        <header id="header">
            <div id="logo">
                <img id="berk" src="<?=base_url?>assets/img/logo.png" alt="berserk logo">
                <a href="<?=base_url?>index.php" id="home">Berserk Store 愁い</a>
            </div>
        </header>


        <!--menu-->
        <?php $categorias = Utils::showCategories(); ?>
        <nav id="menu">
            <ul>
                <li style="background-color:red;"><a href="<?=base_url?>">Inicio</a></li>
               <?php while($cat = $categorias->fetch_object()): ?> 
                    
                <li><a href="#"><?=$cat->nombre?></a></li>
                
                <?php endwhile;?>
                
            </ul>
        </nav>


        <!--DIV PRINCIPAL-->

        <div id="content">