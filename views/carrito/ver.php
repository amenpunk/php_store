<h1>Carrito de Compras</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php foreach($car as $indice => $elemento):
        $producto = $elemento['producto'];
//        var_dump($producto);
    ?>
        <tr>
            <td><img style="height:50px;" src="<?=base_url?>uploads/images/<?=$producto->imagen?>"></td>
            <td>
               <a href="<?=base_url?>productos/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
            </td>
            <td>Q.<?=$elemento['precio']?></td>
            <td><?=$elemento['unidades']?></td>
        </tr>
    <?php endforeach;?>
</table>
<?php $stats = Utils::statsCarrito();?>
<h3 style="float:right; padding-right:15px;">Total Compra: <?=$stats['total']?> </h3>
    </br>
<a href="<?=base_url?>pedidos/hacer" class="button">Hacer pedido</a>