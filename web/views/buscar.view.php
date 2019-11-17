<?php require 'views/header.view.php'; ?>
<div class="contenedor">
  <h2><?php echo $titulo; ?></h2>
  <?php $i; ?>
  <?php foreach ($resultados as $post) :  ?>
  <?php $i++; ?>
  <div class="post">
    <article>
      <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a></h2>
      <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
      <div class="thumb">
        <a href="single.php?id=<?php echo $post['id']; ?>">
          <img src="<?php echo RUTA; ?>imagenes/<?php echo $post['thumb']; ?>" alt="">
        </a>
      </div>
      <p class="extracto"><?php echo $post['extracto']; ?></p>
      <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continuar Leyendo</a>
    </article>
  </div>
  <?php if ($i >= $blog_config['post_por_pagina']) {
				break;
			} ?>
  <?php endforeach; ?>
  <?php require 'paginacion.php'; ?>
</div>
<?php require 'views/footer.view.php'; ?>