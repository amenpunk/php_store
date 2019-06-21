<?php if (isset($categoria)) : ?>
    <h1><?= $categoria->nombre ?></h1>
    <?php if ($productos->num_rows == 0) : ?>
        <h1>No hay productos para mostrar</h1>
    <?php else : ?>

        <?php while ($pro = $productos->fetch_object()) : ?>
            <div class="product">
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>">
                <h2><?= $pro->nombre ?><h2>
                        <p>Q.<?= $pro->precio ?></p>
                        <a href="#" class="button">Comprar</a>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>