<?php if (isset($_SESSION['identity'])) : ?>
    <h1>Completar Pedido</h1>

    <div style="align-content:center; text-align:center;">
    <a style="text-align:center; " href="<?= base_url ?>carrito/index">Ver productos en el carrito</a>
    </br>
    <h3>Direccion para el envio:</h3>
</div>
    <form action="<?=base_url?>pedidos/add" method="POST">
        <label for="provincia">Departamento</label>
        <input type="text" name="provincia">
        
        <label for="ciudad">Municipio</label>
        <input type="text" name="ciudad">
        
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion">
        
       <input type="submit" value="Confirmar Pedido"> 
    </form>


<?php else : ?>
    <h1>Identificate para completar la compra</h1>
    <h2 style="text-align:center;">Puedes logiarte o registarte en nuestra pagina web :)</h2>
    <h2 style="text-align:center;">completando este <a href="<?=base_url?>usuarios/registro">formulario</a> <---</h2>
<?php endif; ?>