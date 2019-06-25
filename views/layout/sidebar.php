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
            <?php if($_SESSION['identity']->id == 2) :?>       
                <h3 id="nombre"><?= strtoupper($_SESSION['identity']->nombre); ?> <?= strtoupper($_SESSION['identity']->apellidos); ?> <i class="fas fa-heart"></i></h3>
            <?php else:?>
                <h3 id="nombre"><?= strtoupper($_SESSION['identity']->nombre); ?> <?= strtoupper($_SESSION['identity']->apellidos); ?></h3>
            <?php endif;?>
         <?php endif; ?>

         <?php $stats = Utils::statsCarrito(); ?>
         <ul style="text-align:center;">
             <!--    
            <li><a href="#">Mis pedidos</a></li>
            gg -->

             <?php if (isset($_SESSION['identity'])) : ?>
                 <?php if (isset($_SESSION['admin'])) : ?>
                     <li><a href="<?= base_url ?>categorias/index">Gestionar Categorias </a></li>
                     <li><a href="<?= base_url ?>productos/gestion">Gestionar Productos </a></li>
                     <li><a href="#">Gestionar Pedidos</a></li>
                     <li style="background-color:black"><a href="<?= base_url ?>/usuarios/logout">Cerrar sessión</a></li>
                 <?php else : ?>

                     <li> <i class="fas fa-shopping-cart"></i> <a " href=" <?= base_url ?>carrito/index">Productos: <?= $stats['count'] ?></a> </li> <li>Total Compra: Q . <?= $stats['total'] ?>


                     <li><a href="<?= base_url ?>carrito/index">Mis Pedidos </a></li>
                     <li style="background-color:black"><a href="<?= base_url ?>/usuarios/logout">Cerrar sessión</a></li>
                 <?php endif; ?>
             <?php else : ?>
                 <a href="<?= base_url ?>/usuarios/registro">Registrate aqui</a>
             <?php endif; ?>
         </ul>

     </div>
 </aside>
 <!--Contenido Principal-->
 <div id="central">