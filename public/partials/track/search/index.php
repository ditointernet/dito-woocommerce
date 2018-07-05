<?php if( is_search() ): ?>
  <?php $search_query = get_search_query(); ?>
  <script type="text/javascript">
    window.dito.track({
      action: 'buscou-produto',
      data: {
        termo: '<?php echo $search_query; ?>'
      }
    });
  </script>
<?php endif; ?>