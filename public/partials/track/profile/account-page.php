<?php if( is_account_page() && !is_view_order_page() ): ?>
  <script type="text/javascript">
    window.dito.track({
      action: 'acessou-minha-conta'
    });
  </script>
<?php endif; ?>