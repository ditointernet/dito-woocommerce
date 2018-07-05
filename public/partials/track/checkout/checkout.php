<?php if( is_checkout() && !is_wc_endpoint_url( 'order-received' ) ): ?>
  <script type="text/javascript">
    window.dito.track({
      action: 'acessou-checkout'
    });
  </script>
<?php endif; ?>