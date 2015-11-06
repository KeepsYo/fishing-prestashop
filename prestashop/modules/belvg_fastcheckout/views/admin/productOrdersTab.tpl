{*
 * 2007-2013 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
 * versions in the future.
 * ****************************************************
 * @category   Belvg
 * @package    Belvg_FastCheckout
 * @author    Alexander Simonchik <support@belvg.com>
 * @site
 * @copyright  Copyright (c) 2010 - 2013 BelVG LLC. (http://www.belvg.com)
 * @license    http://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt
*}

{if count($belvg_fc_data)}
    <fieldset class="belvg_fastcheckout_fieldset">
        <legend><img src="../img/admin/tab-customers.gif">{l s='Belvg Fast Checkout fields' mod='belvg_fastcheckout'}</legend>
    
        <div class="belvg_fastcheckout_data">
            {foreach $belvg_fc_data as $field}
                <p><b>{$field.frontend_name}:</b> {$field.value}<p>
            {/foreach}
        </div>
    </fieldset>
    
    <style>
        .belvg_fastcheckout_data{
            background-color: #EBEDF4;
        }
        .belvg_fastcheckout_fieldset{
            margin-top: 10px;
        }
    </style>
{/if}