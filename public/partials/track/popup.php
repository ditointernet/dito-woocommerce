<script type="text/javascript">
  <?php if(get_option('dito_popup_email_selector') && get_option('dito_popup_btn_selector') && window.dito){ ?>
    var pnameSelector = "<?php echo get_option("dito_popup_name_selector"); ?>";
    var pemailSelector = "<?php echo get_option("dito_popup_email_selector"); ?>";
    var pclickSelector = "<?php echo get_option("dito_popup_btn_selector"); ?>";

    var validate = function(s) {
      return s.match(/^([a-zA-Z0-9_\-\.+]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/);
    };

    var identify = function(email, name) {
      return dito.identify({
        id: dito.generateID(email),
        name: name,
        email: email,
        data: {
          origem_cadastro: 'popup'
        }
      });
    };

    jQuery(document).on('click', pclickSelector, function() {
      var email = jQuery(pemailSelector).val();
      var name = jQuery(pnameSelector).val();

      if (validate(email) == null) return;

      identify(email, name);
    });
  <?php } ?>
</script>