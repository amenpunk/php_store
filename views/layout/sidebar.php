 <!--Barra lateral-->
 <aside id="lateral">
     <div id="login" class="block_aside">

         <?php if (!isset($_SESSION['identity'])) : ?>

             <h3>Entrar a la web</h3>
             <form style="text-align:center" action="<?= base_url ?>usuarios/login" method="POST" id="ingresar">

                 <label for="email">Email</label>
                 <input type="email" name="email">

                 <label for="password">Password</label>
                 <input type="password" name="password">

                 <input type="submit" value="ingresar" name="ingresar">

             </form>

         <?php else : ?>
             <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
         <?php endif; ?>
         <ul style="text-align:center;">
             <!--    
            <li><a href="#">Mis pedidos</a></li>
            gg -->
             <?php if (isset($_SESSION['admin'])) : ?>
                 <li><a href="<?=base_url?>categorias/index">Gestionar Categorias </a></li>
                 <li><a href="<?=base_url?>productos/gestion">Gestionar Productos </a></li>
                 <li><a href="#">Gestionar Pedidos</a></li>

             <?php endif; ?>
             <?php if (isset($_SESSION['identity'])) : ?>
                 <li><a href="#">Mis Pedidos </a></li>
                 <li style="background-color:black"><a href="<?= base_url ?>/usuarios/logout">Cerrar sessión</a></li>
             <?php else : ?>
                 <a href="<?= base_url ?>/usuarios/registro">Registrate aqui</a>
             <?php endif; ?>
         </ul>

     </div>
 </aside>
 <!--Contenido Principal-->
 <div id="central">