<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://dito.com.br/
 * @since      1.0.0
 *
 * @package    Dito_Woocommerce
 * @subpackage Dito_Woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Dito_Woocommerce
 * @subpackage Dito_Woocommerce/public
 * @author     Tannus Esquerdo <tannusewrton@gmail.com>
 */
class Dito_Woocommerce_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dito_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dito_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dito-woocommerce-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dito_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dito_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dito-woocommerce-public.js', array( 'jquery' ), $this->version, false );

	}

	public function insert_dito_script() {
		include ( 'partials/track/install-js.php' );
	}

	public function insert_dito_track() {
		include ( 'partials/track/home.php' );
		include ( 'partials/track/newsletter.php' );
		include ( 'partials/track/popup.php' );
		include ( 'partials/track/catalog/product/view.php' );
		include ( 'partials/track/catalog/category/view.php' );
		include ( 'partials/track/checkout/checkout.php' );
		include ( 'partials/track/checkout/cart/index.php' );
		include ( 'partials/track/profile/account-page.php' );
		include ( 'partials/track/profile/orders.php' );
		include ( 'partials/track/blog/home.php' );
		include ( 'partials/track/blog/post.php' );
		include ( 'partials/track/search/index.php' );
	}

	public function wh_CustomReadOrder($order_id) {
		//getting order object
		$order = wc_get_order($order_id);
		$transactionId = $order->get_id();
		$transactionKey = $order->get_order_key();

		$order_items = $order->get_items();
		$order_items_count = 0;

		$productsData = array();
		$productData = new stdClass;

		foreach ($order_items as $item_id => $item_data) {
			$productData->nome_produto = $item_data['name'];
			$productData->preco_produto = wc_get_order_item_meta($item_id, '_line_total', true);
			$productData->quantidade = wc_get_order_item_meta($item_id, '_qty', true);
			$productData->id = $item_id;
			$productData->id_transacao = $transactionId;

			$item_quantity = wc_get_order_item_meta($item_id, '_qty', true);
			$order_items_count+= $item_quantity;

			$productsData[] = json_encode($productData);
		}

		$productCount = $order_items_count;
    $orderShipping = floatval($order->get_shipping_total());
    $orderTotal = floatval($order->get_total());
    $orderSubtotal = floatval($order->get_total());
		$orderDiscount = floatval($order->get_discount_total());
		$paymentMethod = $order->get_payment_method_title();

		$orderData = new stdClass;
		$orderData->order_key = $transactionKey;
		$orderData->id_transacao = $transactionId;
		$orderData->quantidade_produtos = $productCount;
		$orderData->total = $orderTotal;
		$orderData->total_frete = $orderShipping;
		$orderData->desconto = $orderDiscount;
		$orderData->metodo_pagamento = $paymentMethod;

		?>
    <script type="text/javascript">
			var waitDito = setInterval(function() {
				if(window.dito && window.dito.AppSettings) {
					var orderData = <?php echo json_encode($orderData); ?>;
					var productsData = <?php echo json_encode($productsData); ?>;
					var apiKey = window.dito.AppSettings.apiKey;

					productsData.forEach(function(productData) {
						var productData = JSON.parse(productData);
						window.dito.track({
							action: 'fez-pedido-produto',
							message_id: dito.Helpers.sha1(productData.id_transacao + productData.id),
							data: productData
						})
					});

					window.dito.track({
						action: 'fez-pedido',
						message_id: window.dito.Helpers.sha1(apiKey + orderData.id_transacao),
						data: orderData
					});
					clearInterval(waitDito);
				}
			}, 50);
    </script>
    <?php
	}

}
