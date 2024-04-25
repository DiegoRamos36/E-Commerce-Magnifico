<?php
// Template name: Home
get_header(); ?>



<?php 
  
  $products_slide = wc_get_products([
    'limit' => 6,
    'tag' => ['slide'],
  ]);

  $products_new = wc_get_products([
    'limit' => 9,
    'orderby' => 'date',
    'order' => 'DESC'
  ]);

  $products_sales = wc_get_products([
    'limit' => 9,
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
  ]);

  $data = [];
  $data['slide'] = format_products($products_slide);
  $data['lancamentos'] = format_products($products_new);
  $data['vendas'] = format_products($products_sales);


  ?>

<?php if (have_posts()){while (have_posts()) {the_post(); ?>
  <ul class="vantagens">
    <li>Massa</li>
    <li>Recheio</li>
    <li>Sabor</li>
  </ul>
 


<h1 class="subtitulo">Ofertas Especiais</h1>
  <section class="slide-wrapper">
    <ul class="slide">
      <?php
        foreach ($data['slide'] as $product) { ?>
        <li class="slide-item">
          <img src="<?= $product['img']; ?>" alt="<?= $product['name']?>">
          <div class="slide-info">
          <span class="slide-preco"><?= $product['price'] ?></span>
          <h2 class="slide-nome"><?= $product['name'] ?></h2>
          <a class="btn-link" href="<?= $product['link'] ?>">Ver Produto</a>
          </div></li>
      <?php } ?>
  
    </ul>
  </section>
  <h1 class="subtitulo">Lançamentos</h1>
  <section class="container">

    <?php magnifico_product_list($data['lancamentos']);?>   
  </section>



<?php }} ?>

<?php get_footer();?>