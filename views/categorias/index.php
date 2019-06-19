<h1>Gestionar categorias</h1>

<a style="text-align:center; margin-bottom:10px;" href="<?= base_url ?>categorias/crear" class="button button_small">
    Crear Categoria
</a>

<table>
    <thead>
        <th>ID</th>
        <th>NOMBRE</th>
    </thead>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td><?= $cat->nombre; ?></td>
        </tr>
    <?php endwhile; ?>

</table>