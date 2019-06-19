<h1>Gestion de productos</h1>


<a style="text-align:center; margin-bottom:10px;" href="<?= base_url ?>productos/crear" class="button button_small">
    Crear producto
</a>

<table>
    <thead>
        <th>ID</th>
        <th>DESCRIPCION</th>
        <th>FECHA</th>
        <th>IMAGEN</th>
        <th>NOMBRE</th>
        <th>OFERTA</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    </thead>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td><?= $pro->descripcion; ?></td>
            <td><?= $pro->fecha; ?></td>
            <td><?= $pro->imagen; ?></td>
            <td><?= $pro->nombre; ?></td>
            <td><?= $pro->oferta; ?></td>
            <td><?= $pro->precio; ?></td>
            <td><?= $pro->stock; ?></td>
        </tr>
    <?php endwhile; ?>

</table>