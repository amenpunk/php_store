<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) : ?>

    <h3>Datos del envio:</h3>
    Departamento: <?= $pedido->provincia ?></br>
    Municipio: <?= $pedido->localidad ?></br>
    Direccion: <?= $pedido->direccion ?></br>

    </br></br>
    <h3>Datos del pedido:</h3>
    
    Numero de pedido: <?= $pedido->id ?></br>
    Total a pagar: Q.<?= $pedido->coste ?></br></br>
    <strong>Productos:</strong></br></br>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($prod = $productos->fetch_object()) : ?>
            <!--    
                                                <li style="padding-left:75px; list-style:none;"><?= $prod - unidades ?> | <?= $prod->nombre ?> - Q.<?= $prod->precio ?></li> -->
            <tr>
                <td><img style="height:50px;" src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>"></td>
                <td>
                    <a href="<?= base_url ?>productos/ver&id=<?= $prod->id ?>"><?= $prod->nombre ?></a>
                </td>
                <td>Q.<?= $prod->precio ?></td>
                <td><?= $prod->unidades ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>