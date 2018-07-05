<script type="text/javascript">
  <?php if(get_option('dito_news_email_selector') && get_option('dito_news_btn_selector') && window.dito){ ?>
    var nameSelector = "<?php echo get_option("dito_news_name_selector"); ?>";
    var emailSelector = "<?php echo get_option("dito_news_email_selector"); ?>";
    var clickSelector = "<?php echo get_option("dito_news_btn_selector"); ?>";

    var validate = function(s) {
      return s.match(/^([a-zA-Z0-9_\-\.+]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/);
    };

    var identify = function(email, name) {
      return dito.identify({
        id: dito.generateID(email),
        name: name,
        email: email,
        data: {
          origem_cadastro: 'newsletter'
        }
      });
    };

    jQuery(clickSelector).click(function (event) {
      var email = jQuery(emailSelector).val();
      var name = jQuery(nameSelector).val();

      if (validate(email) == null) return;

      identify(email, name);
    });
  <?php } ?>
</script>