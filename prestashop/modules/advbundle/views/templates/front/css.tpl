{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<style>
.adv-main-container {
	border-color: {$BUNDLE_COLOR_MAIN|escape:'html':'UTF-8'} !important;
}

.adv-tabs .adv-nav-tabs > li.adv-active > a,
.adv-tabs .adv-nav-tabs > li.adv-active > a:hover,
.adv-tabs .adv-nav-tabs > li.adv-active > a:focus {
	border-top: 2px solid {$BUNDLE_COLOR_MAIN|escape:'html':'UTF-8'} !important;
}

.opc-spinner {
	border-top: 5px solid {$BUNDLE_COLOR_MAIN|escape:'html':'UTF-8'} !important;
}

.adv-form-control:hover {
    border-color: {$BUNDLE_COLOR_MAIN|escape:'html':'UTF-8'} !important;
}

.adv-btn-cart {
    background-color: {$BUNDLE_COLOR_BUTTON|escape:'html':'UTF-8'} !important;
    border-color: {$BUNDLE_COLOR_BUTTON_BORDER|escape:'html':'UTF-8'} !important;
}

.adv-btn-cart:hover,
.adv-btn-cart:focus,
.adv-btn-cart:active,
.adv-btn-cart.active {
    background-color: {$BUNDLE_COLOR_BUTTONH|escape:'html':'UTF-8'} !important;
    border-color: {$BUNDLE_COLOR_BUTTON_BORDERH|escape:'html':'UTF-8'} !important;
}

.adv-btn-view {
    background-color: {$BUNDLE_COLOR_VBUTTON|escape:'html':'UTF-8'} !important;
    border-color: {$BUNDLE_COLOR_VBUTTON_BORDER|escape:'html':'UTF-8'} !important;
	width: 100%;
	font-size: 22px;
}

.adv-btn-view:hover,
.adv-btn-view:focus,
.adv-btn-view:active,
.adv-btn-view.active {
    background-color: {$BUNDLE_COLOR_VBUTTONH|escape:'html':'UTF-8'} !important;
    border-color: {$BUNDLE_COLOR_VBUTTON_BORDERH|escape:'html':'UTF-8'} !important;
}

.adv-radio input[type=radio]:checked+label:before, .adv-radio input[type=radio]:hover+label:before {
    border-color: {$BUNDLE_COLOR_ELEMENT|escape:'html':'UTF-8'} !important;
}

.adv-radio label:after {
    background-color: {$BUNDLE_COLOR_ELEMENT|escape:'html':'UTF-8'} !important;
    border: 1px solid {$BUNDLE_COLOR_ELEMENT|escape:'html':'UTF-8'} !important;
}


/*.adv-checkbox-nice label:after {
	border: 6px solid {$BUNDLE_COLOR_ELEMENT|escape:'html':'UTF-8'} !important;
	border-radius: 50%;
	height: 12px;
	top: 6px;
	left: 6px;
}*/

.adv-checkbox-nice label:after {
	height: 7px;
	top: 7px;
	left: 6px;
	border: 3px solid {$BUNDLE_COLOR_ELEMENT|escape:'html':'UTF-8'};
	border-top: none;
	border-right: none;
	transform: rotate(-45deg);
}

</style>