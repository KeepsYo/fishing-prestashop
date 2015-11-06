{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Bundle Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<div id="bundle_price_container">
	<table class="table">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th class="text-right"><strong>{l s='Percent disc.' mod='advbundle'}</strong></th>
				<th class="text-right"><strong>{l s='Tax excl.' mod='advbundle'}</strong></th>
				<th class="text-right"><strong>{l s='Tax incl.' mod='advbundle'}</strong></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{l s='Bundle clear price:' mod='advbundle'}</td>
				<td>&nbsp;</td>
				<td class="text-right"><span class="badge bundle_original_excl">{convertPrice price=$prices['original_excl']}</span></td>
				<td class="text-right"><span class="badge bundle_original_incl">{convertPrice price=$prices['original_incl']}</span></td>
			</tr>
			<tr>
				<td>{l s='Discounts:' mod='advbundle'}</td>
				<td class="center bundle_percent">-{$prices['percent_disc']|floatval}%</td>
				<td class="text-right"><span class="badge badge-warning bundle_disc_excl">{convertPrice price=$prices['disc_excl']}</span></td>
				<td class="text-right"><span class="badge badge-warning bundle_disc_incl">{convertPrice price=$prices['disc_incl']}</span></td>
			</tr>
									<tr>
				<td><strong>{l s='Final bundle price' mod='advbundle'}</strong></td>
				<td>&nbsp;</td>
				<td class="text-right"><span class="badge badge-success bundle_final_excl">{convertPrice price=$prices['final_excl']}</span></td>
				<td class="text-right"><span class="badge badge-success bundle_final_incl">{convertPrice price=$prices['final_incl']}</span></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="9" class="left"><em>{l s='* If the final price will be less than or equal to 0, then the set will cost free for users!' mod='advbundle'}</em></td>
			</tr>
		</tfoot>
	</table>
</div>