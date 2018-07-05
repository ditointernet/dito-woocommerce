<?php if(get_option('dito_enabled')){ ?>
  <script>
    (function(d,e,id){
    window.dito={};window._ditoTemp=[];
    dito.generateID=function(str){return'_dito_sha1_'+str;}
    var m=['init','identify','alias','unalias','track'],s=d.createElement('script'),
    x=d.getElementsByTagName(e)[0];s.type='text/javascript';s.async=true;s.id=id;
    s.src='//storage.googleapis.com/dito/sdk.js';x.parentNode.insertBefore(s,x);
    for(var i=0;i<m.length;i++){dito[m[i]]=function(i){
    return function(){_ditoTemp.push({methodName:m[i],params:arguments});}}(i)}
  })(document,'script','dito-jssdk');

    window.ditoAsyncInit = function() {
      dito.init({
        apiKey: '<?php echo get_option("dito_api_key"); ?>',
        session: true
      });
    }
  </script>
<?php } ?>

<?php if( is_user_logged_in() && get_option('dito_enabled') ) { ?>

  <?php
    $current_user = wp_get_current_user();
    $customer_id = $current_user->ID;

    function customer_gender($gender) {

      if( $gender == 'Masculino' ) {
        return 'male';
      }

      if( $gender == 'Feminino' ) {
        return 'female';
      }

      return $gender;
    }

    function format_date( $date ) {
      $new_date = implode('/', array_reverse(explode('/', $date)));
      return str_replace('/', '-', $new_date);
    }

    $userData = new stdClass;
		$userData->gender = customer_gender(get_user_meta( $customer_id, 'billing_sex', true ));
		$userData->birthday = format_date(get_user_meta( $customer_id, 'billing_birthdate', true ));
		$userData->location = get_user_meta( $customer_id, 'billing_city', true );
		$userData->data = array(
      'telefone' => get_user_meta( $customer_id, 'billing_phone', true ),
      'celular' => get_user_meta( $customer_id, 'billing_cellphone', true ),
      'cpf' => get_user_meta( $customer_id, 'billing_cpf', true ),
      'cep' => get_user_meta( $customer_id, 'billing_postcode', true ),
      'endereco' => get_user_meta( $customer_id, 'billing_address_1', true ),
      'estado' => get_user_meta( $customer_id, 'billing_state', true )
    )
  ?>

  <script type="text/javascript">
    var email = '<?php echo $current_user->user_email ?>';
    var isValid = email.match(/^([a-zA-Z0-9_\-\.+]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/);

    if(isValid) {
      window.dito.identify({
        id: dito.generateID('<?php echo $current_user->user_email ?>'),
        name: '<?php echo $current_user->user_firstname ?> <?php echo $current_user->user_lastname ?>',
        email: '<?php echo $current_user->user_email ?>',
        gender: '<?php echo $userData->gender ?>',
        location: '<?php echo $userData->location ?>',
        birthday: '<?php echo $userData->birthday ?>',
        data: <?php echo json_encode($userData->data) ?>
      })
    }
  </script>
<?php } ?>