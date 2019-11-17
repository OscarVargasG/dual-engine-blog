<?php require 'views/header.view.php'; ?>
<div class="contenedor">
  <div class="post">
    <article>
      <h2 class="titulo">Inicia Sesion.</h2>
      <form class="formulario" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Contraseña">
        <input type="submit" value="Iniciar Sesion">
        <?php if (!empty($errores)) : ?>
        <div class="error">
          <ul>
            <?php echo $errores; ?>
          </ul>
        </div>
        <?php endif; ?>

      </form>
    </article>
  </div>
</div>
<?php require 'views/footer.view.php'; ?>