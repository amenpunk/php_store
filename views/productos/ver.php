<?php if (isset($pro)) : ?>
    <h1><?= $pro->nombre ?></h1>
    <img style="margin-left:25%; width:50%; height:50%"  src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>">
    <div id="descrip">
        <p><strong>Descripcion:</strong> <?= $pro->descripcion ?></p>
        <p><strong>Precio: </strong> Q. <?= $pro->precio ?></p>
        <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
    </div>
<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>