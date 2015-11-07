<?php /*%%SmartyHeaderCode:19503563cf2db764081-92662262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e49a42c3091d203efde15afdaa3f783956568488' => 
    array (
      0 => 'D:\\Works\\Lessons\\prestashop-less\\prestashop\\themes\\default-bootstrap\\modules\\blockcms\\blockcms.tpl',
      1 => 1446128214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19503563cf2db764081-92662262',
  'variables' => 
  array (
    'block' => 0,
    'cms_titles' => 0,
    'cms_key' => 0,
    'cms_title' => 0,
    'cms_page' => 0,
    'link' => 0,
    'show_price_drop' => 0,
    'PS_CATALOG_MODE' => 0,
    'show_new_products' => 0,
    'show_best_sales' => 0,
    'display_stores_footer' => 0,
    'show_contact' => 0,
    'contact_url' => 0,
    'cmslinks' => 0,
    'cmslink' => 0,
    'show_sitemap' => 0,
    'footer_text' => 0,
    'display_poweredby' => 0,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_563cf2db9a7683_30575248',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563cf2db9a7683_30575248')) {function content_563cf2db9a7683_30575248($_smarty_tpl) {?>
	<!-- Block CMS module footer -->
	<section class="footer-block col-xs-12 col-sm-2" id="block_various_links_footer">
		<h4>Information</h4>
		<ul class="toggle-footer">
							<li class="item">
					<a href="http://prestashop-less.dev/prices-drop" title="Specials">
						Specials
					</a>
				</li>
									<li class="item">
				<a href="http://prestashop-less.dev/new-products" title="New products">
					New products
				</a>
			</li>
										<li class="item">
					<a href="http://prestashop-less.dev/best-sales" title="Best sellers">
						Best sellers
					</a>
				</li>
										<li class="item">
					<a href="http://prestashop-less.dev/stores" title="Our stores">
						Our stores
					</a>
				</li>
									<li class="item">
				<a href="http://prestashop-less.dev/contact-us" title="Contact us">
					Contact us
				</a>
			</li>
															<li class="item">
						<a href="http://prestashop-less.dev/content/3-terms-and-conditions-of-use" title="Terms and conditions of use">
							Terms and conditions of use
						</a>
					</li>
																<li class="item">
						<a href="http://prestashop-less.dev/content/4-about-us" title="About us">
							About us
						</a>
					</li>
													<li>
				<a href="http://prestashop-less.dev/sitemap" title="Sitemap">
					Sitemap
				</a>
			</li>
					</ul>
		
	</section>
		<section class="bottom-footer col-xs-12">
		<div>
			<?php echo smartyTranslate(array('s'=>'[1] %3$s %2$s - Ecommerce software by %1$s [/1]','mod'=>'blockcms','sprintf'=>array('PrestaShop™',date('Y'),'©'),'tags'=>array('<a class="_blank" href="http://www.prestashop.com">')),$_smarty_tpl);?>

		</div>
	</section>
		<!-- /Block CMS module footer -->
<?php }} ?>
