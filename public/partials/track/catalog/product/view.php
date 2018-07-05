<?php if(is_product() && get_option('dito_catalog_product_view')){ ?>
  <?php
    function getImageUrl($product_id) {
      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );

      return $image_url[0];
    }

    function getProductTrackingObject($product) {
      if( !$product->get_id() ){
        return;
      }

      $data = Array();
      $categoryIds = $product->get_category_ids();
      $categories = Array();

      if(count($categoryIds)) {
        foreach($categoryIds as $categoryId) {
          $_category = get_term( $categoryId, 'product_cat' );
          array_push($categories, $_category->name);
        }
      }

      if($product->get_id()) {
        $data['id_produto'] = $product->get_id();
        $data['url_imagem'] = getImageUrl( $product->get_id() );
        $data['url_produto'] = get_permalink( $product->get_id() );
      }
      if($categoryIds) {
        $data['categorias_produto'] = implode( ",", $categories);
      }
      if($product->get_price()) {
        $data['preco_produto'] = floatval($product->get_price());
      }
      if($product->get_sale_price()){
        $data['preco_especial_produto'] = floatval($product->get_sale_price());
      }
      if($product->get_name()){
        $data['nome_produto'] = $product->get_name();
      }
      if($product->get_sku()){
        $data['sku'] = $product->get_sku();
      }
      if($product->get_description()){
        $data['descricao'] = $product->get_short_description();
      }

      return $data;
    }

    global $product;
    $product = wc_get_product( $product->get_id() );
    $data = getProductTrackingObject($product);

  ?>

  <script type="text/javascript">
    window.dito.track({
      action: 'acessou-produto',
      data: <?php echo json_encode($data); ?>
    });

    var btnBuy = document.querySelector('.single_add_to_cart_button');

    if(btnBuy) {
      btnBuy.addEventListener('click', () => {
        window.dito.track({
          action: 'adicionou-produto-ao-carrinho',
          data: <?php echo json_encode($data); ?>
        });
      })
    }
  </script>
<?php } ?>