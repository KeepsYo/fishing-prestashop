<?php /* Smarty version Smarty-3.1.19, created on 2015-11-04 13:36:17
         compiled from "/home/a/alintond/fishing-equipment/public_html/modules/belvg_fastcheckout/views/frontend/orderProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9673141565639dfa1a88744-08484486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91ec84a97470f98551f8a038c74ce913283587b9' => 
    array (
      0 => '/home/a/alintond/fishing-equipment/public_html/modules/belvg_fastcheckout/views/frontend/orderProcess.tpl',
      1 => 1446633097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9673141565639dfa1a88744-08484486',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'empty' => 0,
    'PS_CATALOG_MODE' => 0,
    'productNumber' => 0,
    'account_created' => 0,
    'lastProductAdded' => 0,
    'link' => 0,
    'total_discounts' => 0,
    'use_taxes' => 0,
    'show_taxes' => 0,
    'total_wrapping' => 0,
    'priceDisplay' => 0,
    'total_discounts_num' => 0,
    'use_show_taxes' => 0,
    'total_wrapping_taxes_num' => 0,
    'voucherAllowed' => 0,
    'errors_discount' => 0,
    'error' => 0,
    'opc' => 0,
    'discount_name' => 0,
    'displayVouchers' => 0,
    'voucher' => 0,
    'display_tax_label' => 0,
    'total_products' => 0,
    'total_products_wt' => 0,
    'total_wrapping_tax_exc' => 0,
    'total_shipping_tax_exc' => 0,
    'virtualCart' => 0,
    'carrier' => 0,
    'total_shipping' => 0,
    'total_discounts_tax_exc' => 0,
    'total_discounts_negative' => 0,
    'total_price_without_tax' => 0,
    'total_tax' => 0,
    'total_price' => 0,
    'products' => 0,
    'product' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'gift_products' => 0,
    'id_customization' => 0,
    'odd' => 0,
    'customization' => 0,
    'type' => 0,
    'CUSTOMIZE_FILE' => 0,
    'custom_data' => 0,
    'pic_dir' => 0,
    'picture' => 0,
    'CUSTOMIZE_TEXTFIELD' => 0,
    'textField' => 0,
    'cannotModify' => 0,
    'quantityDisplayed' => 0,
    'token_cart' => 0,
    'last_was_odd' => 0,
    'discounts' => 0,
    'discount' => 0,
    'fastcheckout_additional_steps' => 0,
    'isLogged' => 0,
    'img_dir' => 0,
    'back_order_page' => 0,
    'PS_GUEST_CHECKOUT_ENABLED' => 0,
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'conditions' => 0,
    'vat_management' => 0,
    'errorCarrier' => 0,
    'errorTOS' => 0,
    'checked' => 0,
    'isGuest' => 0,
    'isVirtualCart' => 0,
    'isPaymentStep' => 0,
    'fastcheckout_shipping_step' => 0,
    'fastcheckout_payment_step' => 0,
    'cms_id' => 0,
    'checkedTOS' => 0,
    'link_conditions' => 0,
    'fastcheckout_fields' => 0,
    'field' => 0,
    'HOOK_SHOPPING_CART_EXTRA' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5639dfa20b56a9_85358246',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5639dfa20b56a9_85358246')) {function content_5639dfa20b56a9_85358246($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Your shopping cart','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h1 id="cart_title" class="page-heading"><?php echo smartyTranslate(array('s'=>'Shopping-cart summary','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

    <?php if (!isset($_smarty_tpl->tpl_vars['empty']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
        <span class="heading-counter"><?php echo smartyTranslate(array('s'=>'Your shopping cart contains:','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

            <span id="summary_products_quantity"><?php echo $_smarty_tpl->tpl_vars['productNumber']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['productNumber']->value==1) {?><?php echo smartyTranslate(array('s'=>'product','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'products','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php }?></span>
		</span>
    <?php }?>
</h1>

<?php if (isset($_smarty_tpl->tpl_vars['account_created']->value)) {?>
    <p class="alert alert-success">
        <?php echo smartyTranslate(array('s'=>'Your account has been created.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

    </p>
<?php }?>

<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('summary', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if (isset($_smarty_tpl->tpl_vars['empty']->value)) {?>
    <p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</p>
<?php } elseif ($_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
    <p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'This store has not accepted your new order.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</p>
<?php } else { ?>
    <p style="display:none" id="emptyCartWarning" class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</p>
    <?php if (isset($_smarty_tpl->tpl_vars['lastProductAdded']->value)&&$_smarty_tpl->tpl_vars['lastProductAdded']->value) {?>
        <div class="cart_last_product">
            <div class="cart_last_product_header">
                <div class="left"><?php echo smartyTranslate(array('s'=>'Last product added','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</div>
            </div>
            <a class="cart_last_product_img" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['lastProductAdded']->value['id_product'],$_smarty_tpl->tpl_vars['lastProductAdded']->value['link_rewrite'],$_smarty_tpl->tpl_vars['lastProductAdded']->value['category'],null,null,$_smarty_tpl->tpl_vars['lastProductAdded']->value['id_shop']), ENT_QUOTES, 'UTF-8', true);?>
">
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['lastProductAdded']->value['link_rewrite'],$_smarty_tpl->tpl_vars['lastProductAdded']->value['id_image'],'small_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lastProductAdded']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"/>
            </a>
            <div class="cart_last_product_content">
                <p class="product-name">
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['lastProductAdded']->value['id_product'],$_smarty_tpl->tpl_vars['lastProductAdded']->value['link_rewrite'],$_smarty_tpl->tpl_vars['lastProductAdded']->value['category'],null,null,null,$_smarty_tpl->tpl_vars['lastProductAdded']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true);?>
">
                        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lastProductAdded']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                    </a>
                </p>
                <?php if (isset($_smarty_tpl->tpl_vars['lastProductAdded']->value['attributes'])&&$_smarty_tpl->tpl_vars['lastProductAdded']->value['attributes']) {?>
                    <small>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['lastProductAdded']->value['id_product'],$_smarty_tpl->tpl_vars['lastProductAdded']->value['link_rewrite'],$_smarty_tpl->tpl_vars['lastProductAdded']->value['category'],null,null,null,$_smarty_tpl->tpl_vars['lastProductAdded']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true);?>
">
                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lastProductAdded']->value['attributes'], ENT_QUOTES, 'UTF-8', true);?>

                        </a>
                    </small>
                <?php }?>
            </div>
        </div>
    <?php }?>
    <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['total_discounts']->value!=0) {?><?php echo "1";?><?php } else { ?><?php echo "0";?><?php }?><?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['total_discounts_num'] = new Smarty_variable($_tmp3, null, 0);?>
    <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['show_taxes']->value) {?><?php echo "2";?><?php } else { ?><?php echo "0";?><?php }?><?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['use_show_taxes'] = new Smarty_variable($_tmp4, null, 0);?>
    <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['total_wrapping']->value!=0) {?><?php echo "1";?><?php } else { ?><?php echo "0";?><?php }?><?php $_tmp5=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['total_wrapping_taxes_num'] = new Smarty_variable($_tmp5, null, 0);?>

    <div id="order-detail-content" class="table_block table-responsive">
    <table id="cart_summary" class="table table-bordered">
    <thead>
    <tr>
        <th class="cart_product first_item"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</th>
        <th class="cart_description item"><?php echo smartyTranslate(array('s'=>'Description','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</th>
        <th class="cart_ref item"><?php echo smartyTranslate(array('s'=>'Reference','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</th>
        <th class="cart_unit item"><?php echo smartyTranslate(array('s'=>'Unit price','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</th>
        <th class="cart_quantity item"><?php echo smartyTranslate(array('s'=>'Qty','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</th>
        <th class="cart_total item"><?php echo smartyTranslate(array('s'=>'Total','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</th>
        <th class="cart_delete last_item">&nbsp;</th>
    </tr>
    </thead>
    <tfoot>
    <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
            <tr class="cart_total_price">
                <td rowspan="<?php echo 3+$_smarty_tpl->tpl_vars['total_discounts_num']->value+$_smarty_tpl->tpl_vars['use_show_taxes']->value+$_smarty_tpl->tpl_vars['total_wrapping_taxes_num']->value;?>
" colspan="2" id="cart_voucher" class="cart_voucher">
                    <?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors_discount']->value)&&$_smarty_tpl->tpl_vars['errors_discount']->value) {?>
                            <ul class="alert alert-danger">
                                <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors_discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
                                    <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8', true);?>
</li>
                                <?php } ?>
                            </ul>
                        <?php }?>
                        <form action="<?php if ($_smarty_tpl->tpl_vars['opc']->value) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
<?php }?>" method="post" id="voucher">
                            <fieldset>
                                <h4><?php echo smartyTranslate(array('s'=>'Vouchers','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</h4>
                                <input type="text" class="discount_name form-control" id="discount_name" name="discount_name" value="<?php if (isset($_smarty_tpl->tpl_vars['discount_name']->value)&&$_smarty_tpl->tpl_vars['discount_name']->value) {?><?php echo $_smarty_tpl->tpl_vars['discount_name']->value;?>
<?php }?>" />
                                <input type="hidden" name="submitDiscount" />
                                <button type="submit" name="submitAddDiscount" class="button btn btn-default button-small"><span><?php echo smartyTranslate(array('s'=>'OK','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</span></button>
                            </fieldset>
                        </form>
                        <?php if ($_smarty_tpl->tpl_vars['displayVouchers']->value) {?>
                            <p id="title" class="title-offers"><?php echo smartyTranslate(array('s'=>'Take advantage of our exclusive offers:','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</p>
                            <div id="display_cart_vouchers">
                                <?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['displayVouchers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['voucher']->value['code']!='') {?><span class="voucher_name" data-code="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
</span> - <?php }?><?php echo $_smarty_tpl->tpl_vars['voucher']->value['name'];?>
<br />
                                <?php } ?>
                            </div>
                        <?php }?>
                    <?php }?>
                </td>
                <td colspan="3" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total products (tax excl.)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total products','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php }?></td>
                <td colspan="2" class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products']->value),$_smarty_tpl);?>
</td>
            </tr>
        <?php } else { ?>
            <tr class="cart_total_price">
                <td rowspan="<?php echo 3+$_smarty_tpl->tpl_vars['total_discounts_num']->value+$_smarty_tpl->tpl_vars['use_show_taxes']->value+$_smarty_tpl->tpl_vars['total_wrapping_taxes_num']->value;?>
" colspan="2" id="cart_voucher" class="cart_voucher">
                    <?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['errors_discount']->value)&&$_smarty_tpl->tpl_vars['errors_discount']->value) {?>
                            <ul class="alert alert-danger">
                                <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors_discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
                                    <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8', true);?>
</li>
                                <?php } ?>
                            </ul>
                        <?php }?>
                        <form action="<?php if ($_smarty_tpl->tpl_vars['opc']->value) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
<?php }?>" method="post" id="voucher">
                            <fieldset>
                                <h4><?php echo smartyTranslate(array('s'=>'Vouchers','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</h4>
                                <input type="text" class="discount_name form-control" id="discount_name" name="discount_name" value="<?php if (isset($_smarty_tpl->tpl_vars['discount_name']->value)&&$_smarty_tpl->tpl_vars['discount_name']->value) {?><?php echo $_smarty_tpl->tpl_vars['discount_name']->value;?>
<?php }?>" />
                                <input type="hidden" name="submitDiscount" />
                                <button type="submit" name="submitAddDiscount" class="button btn btn-default button-small"><span><?php echo smartyTranslate(array('s'=>'OK','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</span></button>
                            </fieldset>
                        </form>
                        <?php if ($_smarty_tpl->tpl_vars['displayVouchers']->value) {?>
                            <p id="title" class="title-offers"><?php echo smartyTranslate(array('s'=>'Take advantage of our exclusive offers:','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</p>
                            <div id="display_cart_vouchers">
                                <?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['displayVouchers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['voucher']->value['code']!='') {?><span class="voucher_name" data-code="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
</span> - <?php }?><?php echo $_smarty_tpl->tpl_vars['voucher']->value['name'];?>
<br />
                                <?php } ?>
                            </div>
                        <?php }?>
                    <?php }?>
                </td>
                <td colspan="3" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total products (tax incl.)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total products','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php }?></td>
                <td colspan="2" class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products_wt']->value),$_smarty_tpl);?>
</td>
            </tr>
        <?php }?>
    <?php } else { ?>
        <tr class="cart_total_price">
            <td rowspan="<?php echo 3+$_smarty_tpl->tpl_vars['total_discounts_num']->value+$_smarty_tpl->tpl_vars['use_show_taxes']->value+$_smarty_tpl->tpl_vars['total_wrapping_taxes_num']->value;?>
" colspan="2" id="cart_voucher" class="cart_voucher">
                <?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['errors_discount']->value)&&$_smarty_tpl->tpl_vars['errors_discount']->value) {?>
                        <ul class="alert alert-danger">
                            <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors_discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
                                <li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8', true);?>
</li>
                            <?php } ?>
                        </ul>
                    <?php }?>
                    <form action="<?php if ($_smarty_tpl->tpl_vars['opc']->value) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
<?php }?>" method="post" id="voucher">
                        <fieldset>
                            <h4><?php echo smartyTranslate(array('s'=>'Vouchers','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</h4>
                            <input type="text" class="discount_name form-control" id="discount_name" name="discount_name" value="<?php if (isset($_smarty_tpl->tpl_vars['discount_name']->value)&&$_smarty_tpl->tpl_vars['discount_name']->value) {?><?php echo $_smarty_tpl->tpl_vars['discount_name']->value;?>
<?php }?>" />
                            <input type="hidden" name="submitDiscount" />
                            <button type="submit" name="submitAddDiscount" class="button btn btn-default button-small">
                                <span><?php echo smartyTranslate(array('s'=>'OK','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</span>
                            </button>
                        </fieldset>
                    </form>
                    <?php if ($_smarty_tpl->tpl_vars['displayVouchers']->value) {?>
                        <p id="title" class="title-offers"><?php echo smartyTranslate(array('s'=>'Take advantage of our exclusive offers:','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</p>
                        <div id="display_cart_vouchers">
                            <?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['displayVouchers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['voucher']->value['code']!='') {?><span class="voucher_name" data-code="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
</span> - <?php }?><?php echo $_smarty_tpl->tpl_vars['voucher']->value['name'];?>
<br />
                            <?php } ?>
                        </div>
                    <?php }?>
                <?php }?>
            </td>
            <td colspan="3" class="text-right"><?php echo smartyTranslate(array('s'=>'Total products','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</td>
            <td colspan="2" class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products']->value),$_smarty_tpl);?>
</td>
        </tr>
    <?php }?>
    <tr<?php if ($_smarty_tpl->tpl_vars['total_wrapping']->value==0) {?> style="display: none;"<?php }?>>
        <td colspan="3" class="text-right">
            <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total gift wrapping (tax incl.):','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total gift-wrapping cost:','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php }?>
            <?php } else { ?>
                <?php echo smartyTranslate(array('s'=>'Total gift-wrapping cost:','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

            <?php }?>
        </td>
        <td colspan="2" class="price-discount price" id="total_wrapping">
            <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc']->value),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping']->value),$_smarty_tpl);?>

                <?php }?>
            <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc']->value),$_smarty_tpl);?>

            <?php }?>
        </td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0&&!isset($_smarty_tpl->tpl_vars['virtualCart']->value)) {?>
        <tr class="cart_total_delivery" style="<?php if (!isset($_smarty_tpl->tpl_vars['carrier']->value->id)||is_null($_smarty_tpl->tpl_vars['carrier']->value->id)) {?>display:none;<?php }?>">
            <td colspan="3" class="text-right"><?php echo smartyTranslate(array('s'=>'Shipping','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</td>
            <td colspan="2" class="price" id="total_shipping"><?php echo smartyTranslate(array('s'=>'Free Shipping!','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</td>
        </tr>
    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value!=$_smarty_tpl->tpl_vars['total_shipping']->value) {?>
            <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
                <tr class="cart_total_delivery" <?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0) {?> style="display:none;"<?php }?>>
                    <td colspan="3" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total shipping (tax excl.)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total shipping','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php }?></td>
                    <td colspan="2" class="price" id="total_shipping"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value),$_smarty_tpl);?>
</td>
                </tr>
            <?php } else { ?>
                <tr class="cart_total_delivery"<?php if ($_smarty_tpl->tpl_vars['total_shipping']->value<=0) {?> style="display:none;"<?php }?>>
                    <td colspan="3" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total shipping (tax incl.)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total shipping','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php }?></td>
                    <td colspan="2" class="price" id="total_shipping" ><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_shipping']->value),$_smarty_tpl);?>
</td>
                </tr>
            <?php }?>
        <?php } else { ?>
            <tr class="cart_total_delivery"<?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0) {?> style="display:none;"<?php }?>>
                <td colspan="3" class="text-right"><?php echo smartyTranslate(array('s'=>'Total shipping','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</td>
                <td colspan="2" class="price" id="total_shipping" ><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value),$_smarty_tpl);?>
</td>
            </tr>
        <?php }?>
    <?php }?>
    <tr class="cart_total_voucher" <?php if ($_smarty_tpl->tpl_vars['total_discounts']->value==0) {?>style="display:none"<?php }?>>
        <td colspan="3" class="text-right">
            <?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['priceDisplay']->value==0) {?>
                    <?php echo smartyTranslate(array('s'=>'Total vouchers (tax incl.):','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo smartyTranslate(array('s'=>'Total vouchers (tax excl.)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

                <?php }?>
            <?php } else { ?>
                <?php echo smartyTranslate(array('s'=>'Total vouchers','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>

            <?php }?>
        </td>
        <td colspan="2" class="price-discount price" id="total_discount">
            <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['priceDisplay']->value==0) {?>
                <?php $_smarty_tpl->tpl_vars['total_discounts_negative'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_discounts']->value*-1, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars['total_discounts_negative'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_discounts_tax_exc']->value*-1, null, 0);?>
            <?php }?>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_discounts_negative']->value),$_smarty_tpl);?>

        </td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['show_taxes']->value) {?>
        <tr class="cart_total_price">
            <td colspan="3" class="text-right"><?php echo smartyTranslate(array('s'=>'Total (tax excl.)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</td>
            <td colspan="2" class="price" id="total_price_without_tax"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_without_tax']->value),$_smarty_tpl);?>
</td>
        </tr>
        <tr class="cart_total_tax">
            <td colspan="3" class="text-right"><?php echo smartyTranslate(array('s'=>'Total tax','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</td>
            <td colspan="2" class="price" id="total_tax"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_tax']->value),$_smarty_tpl);?>
</td>
        </tr>
    <?php }?>
    <tr class="cart_total_price">
        <td colspan="3" class="total_price_container text-right">
            <span><?php echo smartyTranslate(array('s'=>'Total','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</span>
        </td>
        <?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
            <td colspan="2" class="price" id="total_price_container">
                <span id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price']->value),$_smarty_tpl);?>
</span>
            </td>
        <?php } else { ?>
            <td colspan="2" class="price" id="total_price_container">
                <span id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_without_tax']->value),$_smarty_tpl);?>
</span>
            </td>
        <?php }?>
    </tr>
    </tfoot>
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
        <?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable(0, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->iteration%2, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['ignoreProductLast'] = new Smarty_variable(isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])||count($_smarty_tpl->tpl_vars['gift_products']->value), null, 0);?>
    
        <?php echo $_smarty_tpl->getSubTemplate ("./shopping-cart-product-line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>

    
        <?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?>
            <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['customization']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['customization']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['customization']->key;
 $_smarty_tpl->tpl_vars['customization']->iteration++;
 $_smarty_tpl->tpl_vars['customization']->last = $_smarty_tpl->tpl_vars['customization']->iteration === $_smarty_tpl->tpl_vars['customization']->total;
?>
                <tr id="product_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" class="product_customization_for_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
 <?php if ($_smarty_tpl->tpl_vars['odd']->value) {?>odd<?php } else { ?>even<?php }?> customization alternate_item <?php if ($_smarty_tpl->tpl_vars['product']->last&&$_smarty_tpl->tpl_vars['customization']->last&&!count($_smarty_tpl->tpl_vars['gift_products']->value)) {?>last_item<?php }?>">
                    <td></td>
                    <td colspan="3">
                        <?php  $_smarty_tpl->tpl_vars['custom_data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['custom_data']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['custom_data']->key => $_smarty_tpl->tpl_vars['custom_data']->value) {
$_smarty_tpl->tpl_vars['custom_data']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['custom_data']->key;
?>
                            <?php if ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['CUSTOMIZE_FILE']->value) {?>
                                <div class="customizationUploaded">
                                    <ul class="customizationUploaded">
                                        <?php  $_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['picture']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['custom_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value) {
$_smarty_tpl->tpl_vars['picture']->_loop = true;
?>
                                            <li><img src="<?php echo $_smarty_tpl->tpl_vars['pic_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['picture']->value['value'];?>
_small" alt="" class="customizationUploaded" /></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value) {?>
                                <ul class="typedText">
                                    <?php  $_smarty_tpl->tpl_vars['textField'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['textField']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['custom_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['textField']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['textField']->key => $_smarty_tpl->tpl_vars['textField']->value) {
$_smarty_tpl->tpl_vars['textField']->_loop = true;
 $_smarty_tpl->tpl_vars['textField']->index++;
?>
                                        <li>
                                            <?php if ($_smarty_tpl->tpl_vars['textField']->value['name']) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['textField']->value['name'];?>

                                            <?php } else { ?>
                                                <?php echo smartyTranslate(array('s'=>'Text #','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['textField']->index+1;?>

                                            <?php }?>
                                            <?php echo smartyTranslate(array('s'=>':','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['textField']->value['value'];?>

                                        </li>
                                    <?php } ?>

                                </ul>
                            <?php }?>

                        <?php } ?>
                    </td>
                    <td class="cart_quantity" colspan="2">
                        <?php if (isset($_smarty_tpl->tpl_vars['cannotModify']->value)&&$_smarty_tpl->tpl_vars['cannotModify']->value==1) {?>
                            <span><?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?><?php echo count($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value;?>
<?php }?></span>
                        <?php } else { ?>
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
" name="quantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
_hidden"/>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
" class="cart_quantity_input form-control grey" name="quantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"/>
                            <div class="cart_quantity_button clearfix">
                                <?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<($_smarty_tpl->tpl_vars['customization']->value['quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value)||$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1) {?>
                                    <a
                                            id="cart_quantity_down_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"
                                            class="cart_quantity_down btn btn-default button-minus"
                                            href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp6=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp7=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"add=1&amp;id_product=".$_tmp6."&amp;ipa=".$_tmp7."&amp;id_address_delivery=".((string)$_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;op=down&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
"
                                            rel="nofollow"
                                            title="<?php echo smartyTranslate(array('s'=>'Subtract','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
">
                                        <span><i class="icon-minus"></i></span>
                                    </a>
                                <?php } else { ?>
                                    <a
                                            id="cart_quantity_down_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
"
                                            class="cart_quantity_down btn btn-default button-minus disabled"
                                            href="#"
                                            title="<?php echo smartyTranslate(array('s'=>'Subtract','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
">
                                        <span><i class="icon-minus"></i></span>
                                    </a>
                                <?php }?>
                                <a
                                        id="cart_quantity_up_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"
                                        class="cart_quantity_up btn btn-default button-plus"
                                        href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp9=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"add=1&amp;id_product=".$_tmp8."&amp;ipa=".$_tmp9."&amp;id_address_delivery=".((string)$_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
"
                                        rel="nofollow"
                                        title="<?php echo smartyTranslate(array('s'=>'Add','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
">
                                    <span><i class="icon-plus"></i></span>
                                </a>
                            </div>
                        <?php }?>
                    </td>
                    <td class="cart_delete">
                        <?php if (isset($_smarty_tpl->tpl_vars['cannotModify']->value)&&$_smarty_tpl->tpl_vars['cannotModify']->value==1) {?>
                        <?php } else { ?>
                            <div>
                                <a
                                        id="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product_attribute'];?>
_<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"
                                        class="cart_quantity_delete"
                                        href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp11=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"delete=1&amp;id_product=".$_tmp10."&amp;ipa=".$_tmp11."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;id_address_delivery=".((string)$_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])."&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
"
                                        rel="nofollow"
                                        title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
">
                                    <i class=" icon-trash"></i>
                                </a>
                            </div>
                        <?php }?>
                    </td>
                </tr>
                <?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable($_smarty_tpl->tpl_vars['quantityDisplayed']->value+$_smarty_tpl->tpl_vars['customization']->value['quantity'], null, 0);?>
            <?php } ?>
        
            <?php if ($_smarty_tpl->tpl_vars['product']->value['quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?><?php echo $_smarty_tpl->getSubTemplate ("./shopping-cart-product-line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>
<?php }?>
        <?php }?>
    <?php } ?>
    <?php $_smarty_tpl->tpl_vars['last_was_odd'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->iteration%2, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
        <?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable(0, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->iteration+$_smarty_tpl->tpl_vars['last_was_odd']->value)%2, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['ignoreProductLast'] = new Smarty_variable(isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['cannotModify'] = new Smarty_variable(1, null, 0);?>
    
        <?php echo $_smarty_tpl->getSubTemplate ("./shopping-cart-product-line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>

    <?php } ?>
    </tbody>
    <?php if (sizeof($_smarty_tpl->tpl_vars['discounts']->value)) {?>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['discount']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['discount']->iteration=0;
 $_smarty_tpl->tpl_vars['discount']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
 $_smarty_tpl->tpl_vars['discount']->iteration++;
 $_smarty_tpl->tpl_vars['discount']->index++;
 $_smarty_tpl->tpl_vars['discount']->first = $_smarty_tpl->tpl_vars['discount']->index === 0;
 $_smarty_tpl->tpl_vars['discount']->last = $_smarty_tpl->tpl_vars['discount']->iteration === $_smarty_tpl->tpl_vars['discount']->total;
?>
            <tr class="cart_discount <?php if ($_smarty_tpl->tpl_vars['discount']->last) {?>last_item<?php } elseif ($_smarty_tpl->tpl_vars['discount']->first) {?>first_item<?php } else { ?>item<?php }?>" id="cart_discount_<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
">
                <td class="cart_discount_name" colspan="3"><?php echo $_smarty_tpl->tpl_vars['discount']->value['name'];?>
</td>
                <td class="cart_discount_price"><span class="price-discount">
                            <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>
<?php }?>
                        </span></td>
                <td class="cart_discount_delete">1</td>
                <td class="cart_discount_price">
                    <span class="price-discount price"><?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>
<?php }?></span>
                </td>
                <td class="price_discount_del">
                    <?php if (strlen($_smarty_tpl->tpl_vars['discount']->value['code'])) {?><a href="<?php if ($_smarty_tpl->tpl_vars['opc']->value) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
<?php }?>?deleteDiscount=<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
" class="price_discount_delete" title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Delete','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</a><?php }?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    <?php }?>
    </table>











    <?php if (sizeof($_smarty_tpl->tpl_vars['discounts']->value)) {?>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['discount']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['discount']->iteration=0;
 $_smarty_tpl->tpl_vars['discount']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
 $_smarty_tpl->tpl_vars['discount']->iteration++;
 $_smarty_tpl->tpl_vars['discount']->index++;
 $_smarty_tpl->tpl_vars['discount']->first = $_smarty_tpl->tpl_vars['discount']->index === 0;
 $_smarty_tpl->tpl_vars['discount']->last = $_smarty_tpl->tpl_vars['discount']->iteration === $_smarty_tpl->tpl_vars['discount']->total;
?>
            <tr class="cart_discount <?php if ($_smarty_tpl->tpl_vars['discount']->last) {?>last_item<?php } elseif ($_smarty_tpl->tpl_vars['discount']->first) {?>first_item<?php } else { ?>item<?php }?>" id="cart_discount_<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
">
                <td class="cart_discount_name" colspan="3"><?php echo $_smarty_tpl->tpl_vars['discount']->value['name'];?>
</td>
                <td class="cart_discount_price"><span class="price-discount">
					<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>
<?php }?>
				</span></td>
                <td class="cart_discount_delete">1</td>
                <td class="cart_discount_price">
                    <span class="price-discount price"><?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>
<?php }?></span>
                </td>
                <td class="price_discount_del">
                    <?php if (strlen($_smarty_tpl->tpl_vars['discount']->value['code'])) {?><a href="<?php if ($_smarty_tpl->tpl_vars['opc']->value) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
<?php }?>?deleteDiscount=<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
" class="price_discount_delete" title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Delete','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</a><?php }?>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    <?php }?>

    </div>

    <?php if ($_smarty_tpl->tpl_vars['opc']->value) {?>
        <?php $_smarty_tpl->tpl_vars["back_order_page"] = new Smarty_variable("order-opc.php", null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["back_order_page"] = new Smarty_variable("order.php", null, 0);?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['fastcheckout_additional_steps']->value&&$_smarty_tpl->tpl_vars['isLogged']->value) {?>
    

        <script type="text/javascript">
            // <![CDATA[
            var imgDir = '<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
';
            var authenticationUrl = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("authentication",true));?>
';
            var orderOpcUrl = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("order-opc",true));?>
';
            var historyUrl = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("history",true));?>
';
            var guestTrackingUrl = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("guest-tracking",true));?>
';
            var addressUrl = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("address",true,null,"back=".((string)$_smarty_tpl->tpl_vars['back_order_page']->value)));?>
';
            var orderProcess = 'order-opc';
            var guestCheckoutEnabled = <?php echo intval($_smarty_tpl->tpl_vars['PS_GUEST_CHECKOUT_ENABLED']->value);?>
;
            var currencySign = '<?php echo html_entity_decode($_smarty_tpl->tpl_vars['currencySign']->value,2,"UTF-8");?>
';
            var currencyRate = '<?php echo floatval($_smarty_tpl->tpl_vars['currencyRate']->value);?>
';
            var currencyFormat = '<?php echo intval($_smarty_tpl->tpl_vars['currencyFormat']->value);?>
';
            var currencyBlank = '<?php echo intval($_smarty_tpl->tpl_vars['currencyBlank']->value);?>
';
            var displayPrice = <?php echo $_smarty_tpl->tpl_vars['priceDisplay']->value;?>
;
            var taxEnabled = <?php echo $_smarty_tpl->tpl_vars['use_taxes']->value;?>
;
            var conditionEnabled = <?php echo intval($_smarty_tpl->tpl_vars['conditions']->value);?>
;
            var countries = new Array();
            var countriesNeedIDNumber = new Array();
            var countriesNeedZipCode = new Array();
            var vat_management = <?php echo intval($_smarty_tpl->tpl_vars['vat_management']->value);?>
;

            var txtWithTax = "<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtWithoutTax = "<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtHasBeenSelected = "<?php echo smartyTranslate(array('s'=>'has been selected','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtNoCarrierIsSelected = "<?php echo smartyTranslate(array('s'=>'No carrier has been selected','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtNoCarrierIsNeeded = "<?php echo smartyTranslate(array('s'=>'No carrier is needed for this order','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtConditionsIsNotNeeded = "<?php echo smartyTranslate(array('s'=>'You do not need to accept the Terms of Service for this order.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtTOSIsAccepted = "<?php echo smartyTranslate(array('s'=>'The service terms have been accepted','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtTOSIsNotAccepted = "<?php echo smartyTranslate(array('s'=>'The service terms have not been accepted','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtThereis = "<?php echo smartyTranslate(array('s'=>'There is','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtErrors = "<?php echo smartyTranslate(array('s'=>'Error(s)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtDeliveryAddress = "<?php echo smartyTranslate(array('s'=>'Delivery address','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtInvoiceAddress = "<?php echo smartyTranslate(array('s'=>'Invoice address','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtModifyMyAddress = "<?php echo smartyTranslate(array('s'=>'Modify my address','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtInstantCheckout = "<?php echo smartyTranslate(array('s'=>'Instant checkout','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var txtSelectAnAddressFirst = "<?php echo smartyTranslate(array('s'=>'Please start by selecting an address.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
";
            var errorCarrier = "<?php echo $_smarty_tpl->tpl_vars['errorCarrier']->value;?>
";
            var errorTOS = "<?php echo $_smarty_tpl->tpl_vars['errorTOS']->value;?>
";
            var checkedCarrier = "<?php if (isset($_smarty_tpl->tpl_vars['checked']->value)) {?><?php echo $_smarty_tpl->tpl_vars['checked']->value;?>
<?php } else { ?>0<?php }?>";

            var addresses = new Array();
            var isLogged = <?php echo intval($_smarty_tpl->tpl_vars['isLogged']->value);?>
;
            var isGuest = <?php echo intval($_smarty_tpl->tpl_vars['isGuest']->value);?>
;
            var isVirtualCart = <?php echo intval($_smarty_tpl->tpl_vars['isVirtualCart']->value);?>
;
            var isPaymentStep = <?php echo intval($_smarty_tpl->tpl_vars['isPaymentStep']->value);?>
;
            //]]>
        </script>

        <?php if ($_smarty_tpl->tpl_vars['fastcheckout_shipping_step']->value) {?>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <!-- Carrier -->
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-carrier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <!-- END Carrier -->
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['fastcheckout_payment_step']->value) {?>
            <?php if (!$_smarty_tpl->tpl_vars['fastcheckout_shipping_step']->value) {?>
                <?php if ($_smarty_tpl->tpl_vars['conditions']->value&&$_smarty_tpl->tpl_vars['cms_id']->value) {?>
                    <h3 class="condition_title"><?php echo smartyTranslate(array('s'=>'Terms of service','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</h3>
                    <p class="checkbox">
                        <input type="checkbox" name="cgv" id="cgv" value="1" <?php if ($_smarty_tpl->tpl_vars['checkedTOS']->value) {?>checked="checked"<?php }?> autocomplete="off"/>
                        <label for="cgv"><?php echo smartyTranslate(array('s'=>'I agree to the terms of service and will adhere to them unconditionally.','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</label> <a href="<?php echo $_smarty_tpl->tpl_vars['link_conditions']->value;?>
" class="iframe"><?php echo smartyTranslate(array('s'=>'(Read the Terms of Service)','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</a>
                    </p>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("a.iframe").fancybox({
                                'type' : 'iframe',
                                'width':600,
                                'height':600
                            });
                        });
                    </script>
                <?php }?>
            <?php }?>

            <!-- Payment -->
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-payment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <!-- END Payment -->
        <?php } else { ?>
            <form action="<?php if ($_smarty_tpl->tpl_vars['opc']->value) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
<?php }?>" method="post" id="fast_checkout">
                <div id="belvg_fastcheckout_wrapper">
                    <div class="btn-set">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="belvg_fastcheckout_2" value="<?php echo smartyTranslate(array('s'=>'I confirm my order','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
" />
                    </div>
                </div>
            </form>

            <script type="text/javascript">
                $( "#fast_checkout" ).submit(function( event ) {
                    if (jQuery(".condition_title").length && jQuery("#cgv:checked").length == 0) {
                        jQuery(".condition_title, .checkbox").fadeTo('slow', 0.1).fadeTo('slow', 1.0);
                        return false;
                    }
                });
            </script>
        <?php }?>

    <?php } else { ?>
    
        <form action="<?php if ($_smarty_tpl->tpl_vars['opc']->value) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order-opc',true);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true);?>
<?php }?>" method="post" id="fast_checkout">
            <div id="belvg_fastcheckout_wrapper">
                <div id="belvg_fastcheckout_border">
                    <div id="belvg_fastcheckout_data">
                        <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fastcheckout_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
                            <?php echo $_smarty_tpl->tpl_vars['field']->value['render'];?>

                        <?php } ?>
                    </div>

                    <p class="belvg_fastcheckout_required"><sup>*</sup> <?php echo smartyTranslate(array('s'=>'Required field','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
</p>
                    <div class="btn-set">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="belvg_fastcheckout" value="<?php if ($_smarty_tpl->tpl_vars['fastcheckout_shipping_step']->value==1||$_smarty_tpl->tpl_vars['fastcheckout_payment_step']->value==1) {?><?php echo smartyTranslate(array('s'=>'Submit and continue','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'I confirm my order','mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php }?>" />
                    </div>
                </div>
            </div>

            <?php if (!empty($_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART_EXTRA']->value)) {?>
                <div class="clear"></div>
                <div class="cart_navigation_extra">
                    <div id="HOOK_SHOPPING_CART_EXTRA"><?php echo $_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART_EXTRA']->value;?>
</div>
                </div>
            <?php }?>
        </form>
    <?php }?>
    <!-- FastCheckout -->
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencySign'=>html_entity_decode($_smarty_tpl->tpl_vars['currencySign']->value,2,"UTF-8")),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyRate'=>floatval($_smarty_tpl->tpl_vars['currencyRate']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyFormat'=>intval($_smarty_tpl->tpl_vars['currencyFormat']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyBlank'=>intval($_smarty_tpl->tpl_vars['currencyBlank']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('deliveryAddress'=>intval($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtProduct')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtProduct'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'product','js'=>1,'mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtProduct'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtProducts')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtProducts'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'products','js'=>1,'mod'=>'belvg_fastcheckout'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtProducts'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('imgDir'=>$_smarty_tpl->tpl_vars['img_dir']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('authenticationUrl'=>addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("authentication",true))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('orderOpcUrl'=>addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("order-opc",true))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('historyUrl'=>addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("history",true))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('guestTrackingUrl'=>addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("guest-tracking",true))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('addressUrl'=>addslashes($_smarty_tpl->tpl_vars['link']->value->getPageLink("address",true,null,"back=".((string)$_smarty_tpl->tpl_vars['back_order_page']->value)))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('orderProcess'=>'order-opc'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('guestCheckoutEnabled'=>intval($_smarty_tpl->tpl_vars['PS_GUEST_CHECKOUT_ENABLED']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencySign'=>html_entity_decode($_smarty_tpl->tpl_vars['currencySign']->value,2,"UTF-8")),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyRate'=>floatval($_smarty_tpl->tpl_vars['currencyRate']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyFormat'=>intval($_smarty_tpl->tpl_vars['currencyFormat']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyBlank'=>intval($_smarty_tpl->tpl_vars['currencyBlank']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('displayPrice'=>$_smarty_tpl->tpl_vars['priceDisplay']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('taxEnabled'=>$_smarty_tpl->tpl_vars['use_taxes']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('conditionEnabled'=>intval($_smarty_tpl->tpl_vars['conditions']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('vat_management'=>intval($_smarty_tpl->tpl_vars['vat_management']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('errorCarrier'=>addcslashes($_smarty_tpl->tpl_vars['errorCarrier']->value,'\'')),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('errorTOS'=>addcslashes($_smarty_tpl->tpl_vars['errorTOS']->value,'\'')),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('checkedCarrier'=>intval($_smarty_tpl->tpl_vars['checked']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('addresses'=>array()),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('isVirtualCart'=>intval($_smarty_tpl->tpl_vars['isVirtualCart']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('isPaymentStep'=>intval($_smarty_tpl->tpl_vars['isPaymentStep']->value)),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtWithTax')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtWithTax'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'(tax incl.)','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtWithTax'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtWithoutTax')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtWithoutTax'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'(tax excl.)','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtWithoutTax'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtHasBeenSelected')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtHasBeenSelected'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'has been selected','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtHasBeenSelected'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtNoCarrierIsSelected')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtNoCarrierIsSelected'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'No carrier has been selected','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtNoCarrierIsSelected'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtNoCarrierIsNeeded')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtNoCarrierIsNeeded'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'No carrier is needed for this order','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtNoCarrierIsNeeded'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtConditionsIsNotNeeded')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtConditionsIsNotNeeded'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'You do not need to accept the Terms of Service for this order.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtConditionsIsNotNeeded'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtTOSIsAccepted')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtTOSIsAccepted'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'The service terms have been accepted','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtTOSIsAccepted'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtTOSIsNotAccepted')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtTOSIsNotAccepted'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'The service terms have not been accepted','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtTOSIsNotAccepted'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtThereis')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtThereis'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'There is','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtThereis'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtErrors')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtErrors'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Error(s)','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtErrors'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtDeliveryAddress')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtDeliveryAddress'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Delivery address','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtDeliveryAddress'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtInvoiceAddress')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtInvoiceAddress'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Invoice address','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtInvoiceAddress'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtModifyMyAddress')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtModifyMyAddress'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Modify my address','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtModifyMyAddress'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtInstantCheckout')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtInstantCheckout'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Instant checkout','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtInstantCheckout'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtSelectAnAddressFirst')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtSelectAnAddressFirst'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Please start by selecting an address.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtSelectAnAddressFirst'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'txtFree')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtFree'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Free','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'txtFree'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <!-- /FastCheckout -->
<?php }?>

<?php }} ?>
