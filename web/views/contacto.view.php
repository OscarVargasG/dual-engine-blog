<?php
require 'views/header.view.php';
?>

<div class="contenedor">
  <div class="post">
    <article>
      <h2 class="titulo">Contactanos!</h2>
      <form class="formulario" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <input type="text" name="nombre" placeholder="Nombre:" value="<?php if (!$enviado && isset($nombre)) echo $nombre ?>">

        <input type="text" name="correo" placeholder="Correo:" value="<?php if (!$enviado && isset($correo)) echo $correo ?>">

        <textarea name="mensaje" id="mensaje"
          placeholder="Mensaje:"><?php if (!$enviado && isset($mensaje)) echo $mensaje ?></textarea>

        <?php if (!empty($errores)) : ?>
        <div class="alert error">
          <?php echo $errores; ?>
        </div>
        <?php elseif ($enviado) : ?>
        <div class="alert success">
          <p>Enviado Correctamente</p>
        </div>
        <?php endif ?>
        <input type="submit" name="submit" value="Enviar Correo">

      </form>

    </article>
  </div>



</div>

<?php require 'views/footer.view.php'; ?>