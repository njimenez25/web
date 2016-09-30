<?php
/**
 * Template for the general settings
 */
?>

<h3><?php /* translators: woocommerce */ _e( 'General Options', 'woocommerce' ); ?></h3>

<table class="wc_pos-form-table">

  <tr>
    <th scope="row">
      <label for="pos_only_products"><?php _e( 'Product Visibility', 'woocommerce-pos' ) ?></label>
    </th>
    <td>
      <input type="checkbox" name="pos_only_products" id="pos_only_products" />
      <?php printf( __( 'Enable <a href="%s">POS Only products</a>', 'woocommerce-pos' ), wc_pos_doc_url('products/pos-only-products.html') )?>.
    </td>
  </tr>

  <tr>
    <th scope="row">
      <label for="decimal_qty"><?php _e( 'Allow Decimal Quantity', 'woocommerce-pos' ) ?></label>
      <img title="<?php esc_attr_e( 'Allows items to have decimal values in the quantity field, eg: 0.25', 'woocommerce-pos' ) ?>" src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" data-toggle="wc_pos-tooltip">
    </th>
    <td>
      <input type="checkbox" name="decimal_qty" id="decimal_qty" />
      <?php /* translators: wordpress */ _e('Enable'); ?>
    </td>
  </tr>

  <tr>
    <th scope="row">
      <label for="discount_quick_keys"><?php _e( 'Discount Quick Keys', 'woocommerce-pos' ) ?></label>
      <img title="<?php esc_attr_e( 'Configure discount keys for quick numpad entry', 'woocommerce-pos' ) ?>" src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" data-toggle="wc_pos-tooltip">
    </th>
    <td>
      <select name="discount_quick_keys" id="discount_quick_keys" class="select2" style="width:250px" multiple>
      <?php for($i=1; $i<=100; $i++): ?>
        <option value="<?php echo $i;?>"><?php echo $i;?>%</option>
      <?php endfor; ?>
      </select>
    </td>
  </tr>

  <tr>
    <th scope="row">
      <label for="force_ssl"><?php _e( 'Force SSL (HTTPS)', 'woocommerce-pos' ) ?></label>
      <img title="<?php esc_attr_e( 'Force SSL (HTTPS) on the POS page (a SSL Certificate is required).', 'woocommerce-pos' ) ?>" src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" data-toggle="wc_pos-tooltip">
    </th>
    <td>
      <input type="checkbox" name="force_ssl" id="force_ssl" />
      <?php _e('Force secure POS', 'woocommerce-pos'); ?>
    </td>
  </tr>

</table>