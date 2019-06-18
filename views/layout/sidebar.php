 <!--Barra lateral-->
 <aside id="lateral">
     <div id="login" class="block_aside">

    <?php if(!isset($_SESSION['identity'])): ?>

         <h3>Entrar a la web</h3>
         <form action="<?=base_url?>usuarios/login" method="POST" id="ingresar">

             <label for="email">Email</label>
             <input type="email" name="email">

             <label for="password">Password</label>
             <input type="password" name="password">

             <input type="submit" value="ingresar" name="ingresar">
         </form>

    <?php else: ?>
        <h3><?=$_SESSION['identity']->nombre ?> <?=$_SESSION['identity']->apellidos ?></h3>
    <?php endif; ?>
         <ul>
             <li><a href="#">Mis pedidos</a></li>
             <li><a href="#">Gestionar pedidos</a></li>
             <li><a href="#">Gestionar categorias</a></li>
             
             <li style="background-color:black"><a href="<?=base_url?>/usuarios/logout" >Cerrar sessión</a></li>
         </ul>

     </div>
 </aside>
 <!--Contenido Principal-->
 <div id="central">