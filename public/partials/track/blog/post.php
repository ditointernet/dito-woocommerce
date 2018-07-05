<?php if( is_single() && !is_product() ): ?>
  <?php
    $categories = array();

    foreach(get_the_category() as $category){
      array_push($categories, $category->cat_name);
    }
  ?>

  <script type="text/javascript">
    dito.track({
      action: 'acessou-post-blog',
      data: {
        titulo_post: '<?php echo get_the_title() ?>',
        categorias: '<?php echo join(', ', $categories) ?>',
        author: '<?php echo get_the_author() ?>',
        data_publicacao: '<?php echo get_the_date('Y-m-d') ?>',
      }
    });
  </script>
<?php endif; ?>