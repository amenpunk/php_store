<h1>PRODUCTOS DESTACADOS</h1>

<?php while($pro = $producto->fetch_object()):?>

<div class="product">
    <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>">
    <h2><?= $pro->nombre?><h2>
    <p>Q.<?=$pro->precio?></p>
    <a href="#" class="button">Comprar</a>
</div>

<?php endwhile; ?>