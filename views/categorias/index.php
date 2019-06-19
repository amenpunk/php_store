
<h1>Gestionar categorias</h1>

<table>
    <thead>
        <th>ID</th>
        <th>NOMBRE</th>
    </thead>
<?php while($cat = $categorias->fetch_object()): ?>
    <tr>
        <td><?=$cat->id;?></td>
        <td><?=$cat->nombre;?></td>
    </tr>
<?php endwhile; ?>

</table>