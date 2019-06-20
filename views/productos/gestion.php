<h1>Gestion de productos</h1>

<a style="text-align:center; margin-bottom:10px;" href="<?= base_url ?>productos/crear" class="button button_small">
    Crear producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <script>alert("Producto Ingresado");</script>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <Script>alert("Ocurrio un error")</Script>
<?php endif;?>
<?php Utils::deleteSession('producto'); ?>


<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <script>alert("Producto eliminado");</script>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <Script>alert("Ocurrio un error")</Script>
<?php endif;?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <thead>
        <th>ID</th>
        <!--
        <th>DESCRIPCION</th>
        <th>FECHA</th>
        <th>OFERTA</th>
        <th>IMAGEN</th>
        -->
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>Acciones</th>
    </thead>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <!--
            <td><?= $pro->descripcion; ?></td>
            <td><?= $pro->fecha; ?></td>
            <td><?= $pro->oferta; ?></td>
            <td><?= $pro->imagen; ?></td>
            -->
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
            <td>
                <a style="background:#f9dfbb" href="<?=base_url?>productos/eliminar&id=<?=$pro->id?>" class="button-small">Eliminar</a>
                <a style="background:#f9dfbb" href="<?=base_url?>productos/modificar&id=<?=$pro->id?>" class="button-small">Modificar</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>