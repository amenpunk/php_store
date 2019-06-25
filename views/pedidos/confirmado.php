<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha realizado correctamente</h1>
    <p>Tu pedido ha sido guardado con exito, una vez que realices la transferenica
        bancaria con el coste del pedido sera procesado y enviado.
    </p>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido no pudo ser procesado ocurrio un problea al procesarlo</h1>
<?php endif; ?>