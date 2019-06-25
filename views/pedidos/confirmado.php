<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha realizado correctamente</h1>
    <p>Tu pedido ha sido guardado con exito, una vez que realices la transferenica
        bancaria a la cuenta #291090d con el coste del pedido sera procesado y enviado.

    </p>
    </br>
    <?php if (isset($pedido)) : ?>
        <h3>Datos del pedido:</h3>
        </br>
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
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido no pudo ser procesado ocurrio un problea al procesarlo</h1>
<?php endif; ?>