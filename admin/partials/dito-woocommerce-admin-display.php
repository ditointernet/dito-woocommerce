<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://dito.com.br/
 * @since      1.0.0
 *
 * @package    Dito_Woocommerce
 * @subpackage Dito_Woocommerce/admin/partials
 */
?>

<div class="wrap">
  <div id="dito-settings">
    <div id="dito-settings-header">
      <img src="<?php echo plugin_dir_url( __FILE__ ) . '../images/settings-logo.png'; ?>" />
      <div id="dito-settings-header-title">Dito Tracking</div>
    </div><!-- #dito-settings-header -->

    <div id="dito-settings-content">
      <div id="dito-settings-notes">
        <div id="dito-settings-notes-title">Observações</div>

        <ul>
          <li>Você precisa de um aplicativo criado na platforma da <strong>Dito</strong> para usar este plugin. Não possui um ainda? <a href="http://materiais.dito.com.br/plugin-wordpress" target="_blank">Crie agora o seu</a>.</li>
          <li>As informações e estatísticas dos eventos e usuários são visualizados na plataforma da <strong>Dito</strong>.</li>
        </ul>
      </div><!-- #dito-settings-notes -->

      <form method="post" action="options.php">
        <?php settings_fields($this->dito_get_settings_group_name()); ?>
        <?php do_settings_sections($this->dito_get_settings_group_name()); ?>

        <div id="dito-settings-box-app" class="dito-settings-box">
          <h3>Aplicação</h3>

          <table class="form-table">
            <tr>
              <th scope="row">Habilitar a Dito</th>
              <td>
                <input type="checkbox" name="dito_enabled" <?php if(get_option('dito_enabled')) echo "checked" ?> value="true" />
              </td>
            </tr>
            <tr>
              <th scope="row">Chave API</th>
              <td>
                <input size="100" type="text" name="dito_api_key" value="<?php echo esc_attr( get_option('dito_api_key') ); ?>" />
                <p class="dito-how-to">
                  <em>
                    Para conseguir sua <strong>API Key</strong>, acesse seu aplicativo na plataforma da Dito e vá em <strong>configurações</strong>.
                  </em>
                </p>
              </td>
            </tr>
            <tr>
              <th scope="row">Chave Secret</th>
              <td>
                <input size="100" type="text" name="dito_secret_key" value="<?php echo esc_attr( get_option('dito_secret_key') ); ?>" />
                <p class="dito-how-to">
                  <em>
                    Para conseguir sua <strong>Secret Key</strong>, acesse seu aplicativo na plataforma da Dito e vá em <strong>configurações</strong>.
                  </em>
                </p>
              </td>
            </tr>
          </table>
        </div><!-- .dito-settings-box -->

        <div class="dito-settings-box">
          <h3>Eventos:</h3>

          <table class="form-table">
            <tr>
              <th scope="row">Página Produto</th>
              <td>
                <input type="checkbox" name="dito_catalog_product_view" <?php if(get_option('dito_catalog_product_view')) echo "checked" ?> value="true" />
              </td>
            </tr>
            <tr>
              <th scope="row">Página Categoria</th>
              <td>
                <input type="checkbox" name="dito_catalog_category_view" <?php if(get_option('dito_catalog_category_view')) echo "checked" ?> value="true" />
              </td>
            </tr>
            <tr>
              <th scope="row">Busca</th>
              <td>
                <input type="checkbox" name="dito_catalog_search_result" <?php if(get_option('dito_catalog_search_result')) echo "checked" ?> value="true" />
              </td>
            </tr>
            <tr>
              <th scope="row">Página Carrinho</th>
              <td>
                <input type="checkbox" name="dito_checkout_cart_index" <?php if(get_option('dito_checkout_cart_index')) echo "checked" ?> value="true" />
              </td>
            </tr>
            <tr>
              <th scope="row">Página Checkout</th>
              <td>
                <input type="checkbox" name="dito_checkout_onepage_index" <?php if(get_option('dito_checkout_onepage_index')) echo "checked" ?> value="true" />
              </td>
            </tr>
            <tr>
              <th scope="row">Compra</th>
              <td>
                <input type="checkbox" name="dito_checkout_onepage_success" <?php if(get_option('dito_checkout_onepage_success')) echo "checked" ?> value="true" />
              </td>
            </tr>
          </table>
        </div><!-- .dito-settings-box -->

        <div class="dito-settings-box">
          <h3>Newsletter</h3>

          <table class="form-table">
            <tr>
              <th scope="row">Seletor Nome</th>
              <td><input size="40" type="text" name="dito_news_name_selector" value="<?php echo esc_attr( get_option('dito_news_name_selector') ); ?>" /></td>
            </tr>

            <tr>
              <th scope="row">Seletor E-mail</th>
              <td><input size="40" type="text" name="dito_news_email_selector" value="<?php echo esc_attr( get_option('dito_news_email_selector') ); ?>" /></td>
            </tr>

            <tr>
              <th scope="row">Seletor botão</th>
              <td><input size="40" type="text" name="dito_news_btn_selector" value="<?php echo esc_attr( get_option('dito_news_btn_selector') ); ?>" /></td>
            </tr>
          </table>
        </div><!-- .dito-settings-box -->

        <div class="dito-settings-box">
          <h3>Popup</h3>

          <table class="form-table">
            <tr>
              <th scope="row">Seletor Nome</th>
              <td><input size="40" type="text" name="dito_popup_name_selector" value="<?php echo esc_attr( get_option('dito_popup_name_selector') ); ?>" /></td>
            </tr>

            <tr>
              <th scope="row">Seletor E-mail</th>
              <td><input size="40" type="text" name="dito_popup_email_selector" value="<?php echo esc_attr( get_option('dito_popup_email_selector') ); ?>" /></td>
            </tr>

            <tr>
              <th scope="row">Seletor botão</th>
              <td><input size="40" type="text" name="dito_popup_btn_selector" value="<?php echo esc_attr( get_option('dito_popup_btn_selector') ); ?>" /></td>
            </tr>
          </table>
        </div><!-- .dito-settings-box -->

        <div id="dito-settings-actions">
          <?php submit_button('Salvar', 'primary','submit', TRUE); ?>
        </div>
      </form>
    </div><!-- #dito-settings-content -->
  </div><!-- #dito-settings -->
</div>
