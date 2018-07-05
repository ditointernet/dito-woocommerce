<?php if(is_cart() && get_option('dito_checkout_cart_index')): ?>
  <?php
    global $woocommerce;
    $data = Array();

    $data['quantidade_produtos'] = $woocommerce->cart->cart_contents_count;
    $data['total'] = $woocommerce->cart->total;
    $data['subtotal'] = $woocommerce->cart->subtotal;
  ?>

  <script type="text/javascript">
    window.dito.track({
      action: 'acessou-carrinho',
      data: <?php echo json_encode($data); ?>
    });
  </script>
<?php endif; ?>

