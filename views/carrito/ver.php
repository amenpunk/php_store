<h1>Carrito de Compras</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Quitar</th>
    </tr>
    <?php foreach ($car as $indice => $elemento) :
        $producto = $elemento['producto'];
        //        var_dump($producto);
        ?>
        <tr>
            <td><img style="height:50px;" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>"></td>
            <td>
                <a href="<?= base_url ?>productos/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
            </td>
            <td>Q.<?= $elemento['precio'] ?></td>
            <td><?= $elemento['unidades'] ?></td>
            <td><a href="<?=base_url?>carrito/remove&index=<?=$indice?>"> <i style="color:red" class="fas fa-times-circle"></i></a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $stats = Utils::statsCarrito(); ?>
<h3 style="float:right; padding-right:15px;">Total Compra: Q.<?= $stats['total'] ?> </h3>
</br>
<div style="margin-top:50px; float:right; width:100%; height:100%;">
    <a style="width:15%; background-color:green; color:black; float:right;" href="<?= base_url ?>pedidos/hacer" class="button">Hacer pedido <i style="color:white" class="fas fa-check-circle"></i></a>
    <a style="width:15%; background-color:red; float:right; color:black;"href="<?= base_url ?>carrito/delete_all" class="button">Vaciar Carrito <i style="color:white" class="fas fa-times-circle"></i></a>
</div>