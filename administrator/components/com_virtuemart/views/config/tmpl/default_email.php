<?php
/**
 * Admin form for the email configuration settings
 *
 * @package	VirtueMart
 * @subpackage Config
 * @author Oscar van Eijk
 * @link https://virtuemart.net
 * @copyright Copyright (c) 2015 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_checkout.php 9008 2015-10-04 20:41:08Z Milbo $
 */
defined('_JEXEC') or die('Restricted access');
?>
<fieldset>
	<legend><?php echo vmText::_('COM_VIRTUEMART_ADMIN_CFG_SHOP_EMAILS'); ?></legend>
	<table class="admintable">
		<tr>
			<td class="key">
					<span class="hasTip" title="<?php echo vmText::_('COM_VIRTUEMART_ADMIN_CFG_MAIL_FORMAT_EXPLAIN'); ?>">
						<?php echo vmText::_('COM_VIRTUEMART_ADMIN_CFG_MAIL_FORMAT'); ?>
					</span>
			</td>
			<td>
				<select name="order_mail_html" id="order_mail_html">
					<option value="0" <?php if (VmConfig::get('order_mail_html') == '0') {
						echo 'selected="selected"';
					} ?>>
						<?php echo vmText::_('COM_VIRTUEMART_ADMIN_CFG_MAIL_FORMAT_TEXT'); ?>
					</option>
					<option value="1" <?php if (VmConfig::get('order_mail_html') == '1') {
						echo 'selected="selected"';
					} ?>>
						<?php echo vmText::_('COM_VIRTUEMART_ADMIN_CFG_MAIL_FORMAT_HTML'); ?>
					</option>
				</select>
			</td>
		</tr>
		<?php
		echo VmHTML::row('checkbox','COM_VIRTUEMART_ADMIN_CFG_MAIL_USEVENDOR','useVendorEmail',VmConfig::get('useVendorEmail',0));
		echo VmHTML::row('checkbox','COM_VM_CFG_INVOICE_IN_USER_LANG','invoiceInUserLang',VmConfig::get('invoiceInUserLang',0));
		echo VmHTML::row('checkbox','COM_VM_CFG_DEBUG_MAIL','debug_mail',VmConfig::get('debug_mail',0));
		?>

		<?php /*?>		<!-- NOT YET -->
 		echo VmHTML::row('checkbox','COM_VIRTUEMART_ADMIN_CFG_MAIL_FROM_RECIPIENT','mail_from_recipient',VmConfig::get('mail_from_recipient',0));
 		echo VmHTML::row('checkbox','COM_VIRTUEMART_ADMIN_CFG_MAIL_FROM_SETSENDER','mail_from_setsender',VmConfig::get('mail_from_setsender',0));
<?php */
		echo VmHTML::row('input','COM_VM_CFG_EMAIL_ADDITIONAL_VENDOR_MAIL','addVendorEmail', VmConfig::get('addVendorEmail',''));
		$attrlist = 'class="inputbox" multiple="multiple" ';
		echo VmHTML::row('genericlist','COM_VM_CFG_EMAIL_FIELDS_SHOPPER',$this->emailSf_Options,'email_sf_s[]',$attrlist, 'name', 'title', VmConfig::get('email_sf_s',array('email')), 'email_sf_s',true);

		echo VmHTML::row('genericlist','COM_VIRTUEMART_ADMIN_CFG_STATUS_PDF_INVOICES',$this->osWoP_Options,'inv_os[]',$attrlist, 'order_status_code', 'order_status_name', VmConfig::get('inv_os',array('C')), 'inv_os',true);
		echo VmHTML::row('genericlist','COM_VIRTUEMART_CFG_OSTATUS_EMAILS_SHOPPER',$this->osWoP_Options,'email_os_s[]',$attrlist, 'order_status_code', 'order_status_name', VmConfig::get('email_os_s',array('U','C','S','R','X')), 'email_os_s',true);
		echo VmHTML::row('genericlist','COM_VIRTUEMART_CFG_OSTATUS_EMAILS_VENDOR',$this->os_Options,'email_os_v[]',$attrlist, 'order_status_code', 'order_status_name', VmConfig::get('email_os_v',array('U','C','R','X')), 'email_os_v',true);

		echo VmHTML::row('input','COM_VIRTUEMART_CFG_ATTACH','attach', VmConfig::get('attach',''));
		echo VmHTML::row('genericlist','COM_VIRTUEMART_CFG_ATTACH_OS',$this->osWoP_Options,'attach_os[]',$attrlist, 'order_status_code', 'order_status_name', VmConfig::get('attach_os',array('U','C','R','X')), 'attach_os',true);

		?>
	</table>
</fieldset>


