<?php if(is_product_category() && get_option('dito_catalog_category_view')): ?>
  <?php
    $catObj = get_queried_object();
    $data = Array();
    $data['nome_categoria'] = $catObj->name;
  ?>

  <script type="text/javascript">
    window.dito.track({
      action: 'acessou-categoria',
      data: <?php echo json_encode($data); ?>
    });
  </script>
<?php endif; ?>