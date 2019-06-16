<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sticker Store</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <div id="container">

    <!--cabezera-->

    <header id="header">
        <div id="logo">
            <img id="berk" src="assets/img/logo.png" alt="berserk logo">
            <a href="index.php" id="home">Berserk Store 愁い</a>
        </div>
    </header>


    <!--menu-->

    <nav id="menu">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Inicio</a></li>
        </ul>
    </nav>


    <!--DIV PRINCIPAL-->

    <div id="content">

        <!--Barra lateral-->
        <aside id="lateral">
            <div id="login" class="block_aside">
                <form action="#" method="POST">
                
                <label for="email">Email</label>
                <input type="email" name="email">    
                
                <label for="password">password</label>
                <input type="password" name="password">    

                <input type="submit" value="ingresar" name="ingresar">
                </form>

                <a href="#">Mis pedidos</a>
                <a href="#">Gestionar pedidos</a>
                <a href="#">Gestionar categorias</a>

            </div>
        </aside>

        <!--Contenido Principal-->
        <div id="central">
            
            <div class="product">
                <img src="assets/img/shirt.jpg">
                <h2>BERSERK SHIRT BLACK COTTOM</h2>
                <p>50 Quetzales</p>
                <a href="#">Comprar</a>
            </div>
            
            <div class="product">
                <img src="assets/img/shirt.jpg">
                <h2>BERSERK SHIRT BLACK COTTOM</h2>
                <p>50 Quetzales</p>
                <a href="#">Comprar</a>
            </div>
            
            <div class="product">
                <img src="assets/img/shirt.jpg">
                <h2>BERSERK SHIRT BLACK COTTOM</h2>
                <p>50 Quetzales</p>
                <a href="#">Comprar</a>
            </div>
            
        </div>
    </div>


        <!--Pie DE PAGINA-->
        <footer id="footer">
            <p> Desarollada por ecc.code WEB &copy; <?=date('Y');?></p>
        </footer>
    </div>
    </body>

</html>