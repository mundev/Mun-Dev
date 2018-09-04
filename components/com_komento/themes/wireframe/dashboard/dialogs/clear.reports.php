<?php
/**
* @package		Komento
* @copyright	Copyright (C) 2010 - 2016 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Komento is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<dialog>
	<width>400</width>
	<height>150</height>
	<selectors type="json">
	{
		"{closeButton}": "[data-close-button]",
		"{submit}": "[data-clear-button]",
		"{form}": "[data-clear-form]"
	}
	</selectors>
	<bindings type="javascript">
	{
		"{closeButton} click": function() {
			this.parent.close();
		},
		"{submit} click": function() {
			this.form().submit();
		}
	}
	</bindings>
	<title><?php echo JText::_('COM_KOMENTO_CLEAR_REPORTS_DIALOG_TITLE'); ?></title>
	<content>
		<form action="<?php echo JRoute::_('index.php');?>" method="post" data-clear-form>
			<p class="t-lg-mt--md"><?php echo JText::_('COM_KOMENTO_CLEAR_REPORTS_DIALOG_CONTENT');?></p>
				
			<?php foreach ($items as $id) { ?>
			<input type="hidden" name="id[]" value="<?php echo $id; ?>" />
			<?php } ?>

			<?php echo $this->html('form.returnUrl', $return); ?>
			<?php echo $this->html('form.action', 'comments.clearreports'); ?>
		</form>
	</content>
	<buttons>
		<button data-close-button type="button" class="btn btn-kt-default-o btn-sm"><?php echo JText::_('COM_KOMENTO_CANCEL_BUTTON'); ?></button>
		<button type="button" class="btn btn-kt-primary btn-sm" data-clear-button><?php echo JText::_('COM_KOMENTO_CLEAR_REPORTS_BUTTON'); ?></button>
	</buttons>
</dialog>
