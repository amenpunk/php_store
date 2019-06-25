<h1>Mis pedidos</h1>

<table>
    <tr>
        <th>ID pedido</th>
        <th>Coste pedido</th>
        <th>Fecha</th>

    </tr>
    <?php while($ped = $pedidos->fetch_object()): ?>
        <tr>
            <td><a href="<?=base_url?>pedidos/detalle&id=<?=$ped->id?>"><?=$ped->id?></a></td>
            <td>Q. <?=$ped->coste?></td>
            <td><?=$ped->fecha?></td>
        </tr>
    <?php endwhile; ?>
</table>