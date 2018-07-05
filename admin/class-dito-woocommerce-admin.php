<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://dito.com.br/
 * @since      1.0.0
 *
 * @package    Dito_Woocommerce
 * @subpackage Dito_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dito_Woocommerce
 * @subpackage Dito_Woocommerce/admin
 * @author     Tannus Esquerdo <tannusewrton@gmail.com>
 */
class Dito_Woocommerce_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dito-woocommerce-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dito-woocommerce-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */

	public function add_menu_dito() {
		add_menu_page(
			'Dito WooCommerce',
			'Dito',
			'manage_options',
			$this->plugin_name,
			array($this, 'display_dito_page'),
			"data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIyLjAuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkNhbWFkYV8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIKCSB2aWV3Qm94PSIwIDAgMTU3LjEgMTUyLjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDE1Ny4xIDE1Mi43OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6I0ZGRkZGRjt9Cjwvc3R5bGU+CjxnPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTE5LDE1Mi43YzEwLjUsMCwxOS04LjUsMTktMTljMC0xMC41LTguNS0xOS0xOS0xOWMtMTAuNSwwLTE5LDguNS0xOSwxOUMwLDE0NC4yLDguNSwxNTIuNywxOSwxNTIuN3oiLz4KPC9nPgo8cGF0aCBjbGFzcz0ic3QwIiBkPSJNODAuNywwQzM4LjYsMCw0LjQsMzQuMiw0LjQsNzYuM2MwLDEwLjcsMi4yLDIwLjgsNi4yLDMwLjFjMi43LTAuOCw1LjUtMS4zLDguNS0xLjMKCWMxNS44LDAsMjguNiwxMi44LDI4LjYsMjguNmMwLDMuNy0wLjcsNy4yLTIsMTAuNGMxMC41LDUuNSwyMi41LDguNiwzNS4yLDguNmM0Mi4yLDAsNzYuMy0zNC4yLDc2LjMtNzYuMwoJQzE1Ny4xLDM0LjIsMTIyLjksMCw4MC43LDB6IE04MC43LDExOS41Yy0yMy44LDAtNDMuMi0xOS4zLTQzLjItNDMuMmMwLTIzLjgsMTkuMy00My4yLDQzLjItNDMuMmMyMy44LDAsNDMuMiwxOS4zLDQzLjIsNDMuMgoJQzEyMy45LDEwMC4yLDEwNC42LDExOS41LDgwLjcsMTE5LjV6Ii8+Cjwvc3ZnPgo="
		);
	}

	/**
	 * Render the Dito page for plugin
	 *
	 * @since  1.0.0
	 */

	public function display_dito_page() {
		include_once 'partials/dito-woocommerce-admin-display.php';
	}

	public function dito_settings() {
    $this->dito_app_settings();
		$this->dito_tracking_settings();
		$this->dito_news_settings();
		$this->dito_popup_settings();
	}

	public function dito_get_settings_group_name() {
    return 'dito-settings';
  }

  public function dito_app_settings() {
		$this->dito_register_setting('dito_enabled');
		$this->dito_register_setting('dito_api_key');
		$this->dito_register_setting('dito_secret_key');
  }

  public function dito_tracking_settings() {
    $this->dito_register_setting('dito_home_track_enabled', true);
    $this->dito_register_setting('dito_catalog_product_view', true);
		$this->dito_register_setting('dito_catalog_category_view', true);
		$this->dito_register_setting('dito_catalog_search_result', true);
		$this->dito_register_setting('dito_checkout_cart_index', true);
		$this->dito_register_setting('dito_checkout_onepage_index', true);
		$this->dito_register_setting('dito_checkout_onepage_success', true);
	}

	public function dito_news_settings() {
		$this->dito_register_setting('dito_news_name_selector');
		$this->dito_register_setting('dito_news_email_selector');
		$this->dito_register_setting('dito_news_btn_selector');
	}

	public function dito_popup_settings() {
		$this->dito_register_setting('dito_popup_name_selector');
		$this->dito_register_setting('dito_popup_email_selector');
		$this->dito_register_setting('dito_popup_btn_selector');
	}

  public function dito_register_setting($optionName, $defaultValue = null) {
    register_setting($this->dito_get_settings_group_name(), $optionName);

    if($defaultValue) {
      add_option($optionName, $defaultValue);
    }
	}

	public function ulp_subscribe($_popup_options, $_subscriber) {
		if (empty($_subscriber['{subscription-email}'])) return;
		$popup_options = $_popup_options;
		$platform_api_key = get_option('dito_api_key');
		$signature = sha1(get_option('dito_secret_key'));
		$id = sha1($_subscriber['{subscription-email}']);
		$data = array(
			'platform_api_key' => $platform_api_key,
			'sha1_signature' => $signature,
			'user_data' => json_encode(array(
				'name' => $_subscriber['{subscription-name}'],
				'email' => $_subscriber['{subscription-email}'],
				'data' => json_encode(array(
					'popup' => $_subscriber['{popup-id}']
				))
			))
		);

		try {
			$curl = curl_init('https://login.plataformasocial.com.br/users/portal/'.$id.'/signup');
			curl_setopt($curl, CURLOPT_TIMEOUT, 10);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
			curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($curl);
			curl_close($curl);
		} catch (Exception $e) {
			error_log(json_encode($e));
		}
	}

	public function order_status_changed( $order_id, $old_status, $new_status ) {
		$order = wc_get_order($order_id);
		$customer_email = $order->get_billing_email();

		if( $new_status == 'processing' ) {
			$this->order_processing($order, $customer_email);
		}

		if( $new_status == 'completed' ) {
			$this->order_completed($order, $customer_email);
		}

		if( $new_status == 'cancelled' ) {
			$this->order_cancelled($order, $customer_email);
		}

		if( $new_status == 'refunded' ) {
			$this->order_refunded($order, $customer_email);
		}
	}

	public function order_processing($order, $customer_email) {
		$api_key = get_option('dito_api_key');
		$orderData = $this->getOrderData($order->get_id());
		$message_id = sha1($api_key . $orderData->order_key);
		$reference = sha1($customer_email);
		$ordered = array(
			'action' => 'comprou',
			'message_id' => $message_id,
			'revenue' => $orderData->total,
			'data' => json_encode($orderData)
		);

		$res_ordered = $this->event_track($reference, $ordered);

		$products = $this->getOrderProducts($order);
		foreach ($products as $product_id => $product) {
			$mid = sha1($product['id_transacao'] . $product['id']);
			$ordered_product = array(
				'action' => 'comprou-produto',
				'message_id' => $mid,
				'data' => json_encode($product)
			);

			$res_prod = $this->event_track($reference, $ordered_product);
		}
	}

	public function order_completed($order, $customer_email) {
		if($customer_email) {
			$reference = sha1($customer_email);
			$products = $this->getOrderProducts($order);
			$produtos = [];
			$ids_produtos = [];

			foreach ($products as $product_id => $product) {
				$produtos[] = $product['nome_produto'];
				$ids_produtos[] = $product['id'];
			}

			$event = array(
				'action' => 'pedido-concluido',
				'data' => array(
						'produtos' => $produtos,
						'ids_produtos' => $ids_produtos,
						'id_pedido' => $order->get_id()
					)
			);

			$response = $this->event_track($reference, $event);
		}
	}

	public function order_cancelled($order, $customer_email) {
		if($customer_email) {
			$reference = sha1($customer_email);
			$event = array(
				'action' => 'status-pedido',
				'data' => array(
						'status' => 'Cancelado',
						'id_pedido' => $order->get_id()
					)
			);

			$response = $this->event_track($reference, $event);
		}
	}

	public function order_refunded($order, $customer_email) {
		$api_key = get_option('dito_api_key');
		$orderData = $this->getOrderData($order->get_id());
		$message_id = sha1($api_key . $orderData->order_key);
		$reference = sha1($customer_email);
		$ordered = array(
			'action' => 'devolveu',
			'message_id' => $message_id,
			'revenue' => "-" . $order->get_total(),
			'data' => json_encode($orderData)
		);

		$res_ordered = $this->event_track($reference, $ordered);

		$products = $this->getOrderProducts($order);
		foreach ($products as $product_id => $product) {
			$mid = sha1($product['id_transacao'] . $product['id']);
			$ordered_product = array(
				'action' => 'devolveu-produto',
				'message_id' => $mid,
				'data' => json_encode($product)
			);

			$res_prod = $this->event_track($reference, $ordered_product);
		}
	}

	public function event_track($reference, $event) {
		$url = "http://events.plataformasocial.com.br/users/" . $reference;
		$ch = curl_init($url);
		$platform_api_key = get_option('dito_api_key');
		$signature = sha1(get_option('dito_secret_key'));

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array(
				'id_type' => 'id',
				'platform_api_key' => $platform_api_key,
				'sha1_signature' => $signature,
				'event'=> json_encode($event)
			)
		);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$output = curl_exec($ch);
		curl_close($ch);

		return $output;
	}

	public function getOrderData($order_id) {
		//getting order object
		$order = wc_get_order($order_id);
		$transactionId = $order->get_id();
		$transactionKey = $order->get_order_key();

		$order_items = $order->get_items();
		$order_items_count = 0;

		foreach ($order_items as $item_id => $item_data) {
			$item_quantity = wc_get_order_item_meta($item_id, '_qty', true);
			$order_items_count+= $item_quantity;
		}

		$productCount = $order_items_count;
    $orderShipping = floatval($order->get_shipping_total());
    $orderTotal = floatval($order->get_total());
    $orderSubtotal = floatval($order->get_subtotal());
		$orderDiscount = floatval($order->get_discount_total());
		$paymentMethod = $order->get_payment_method_title();

		$orderData = new stdClass;
		$orderData->date_created = $order->get_date_created()->date('Y-m-dTH:i:s-03:00');
		$orderData->order_key = $transactionKey;
		$orderData->id_transacao = $transactionId;
		$orderData->quantidade_produtos = $productCount;
		$orderData->total = $orderTotal;
		$orderData->subtotal = $orderSubtotal;
		$orderData->total_frete = $orderShipping;
		$orderData->desconto = $orderDiscount;
		$orderData->metodo_pagamento = $paymentMethod;

		return $orderData;
	}

	public function getOrderProducts($order) {
		$order_items = $order->get_items();
		$transactionId = $order->get_id();
		$productsData = [];

		foreach ($order_items as $item_id => $item_data) {
			$productData = array(
				'nome_produto' => $item_data['name'],
				'preco_produto' => wc_get_order_item_meta($item_id, '_line_total', true),
				'quantidade' => wc_get_order_item_meta($item_id, '_qty', true),
				'id' => $item_id,
				'id_transacao' => $transactionId
			);

			$productsData[] = $productData;
		}

		return $productsData;
	}

}
