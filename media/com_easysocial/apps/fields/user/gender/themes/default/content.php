<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2016 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div data-field-gender data-error-required="<?php echo JText::_('PLG_FIELDS_GENDER_VALIDATION_GENDER_REQUIRED', true);?>">
	
	<?php if (false) { ?>
	<select id="<?php echo $inputName;?>" name="<?php echo $inputName;?>" data-field-gender-input class="o-form-control input-sm">
		<option value=""<?php echo $value == 0 ? ' selected="selected"' : '';?>><?php echo JText::_( 'PLG_FIELDS_GENDER_SELECT_A_GENDER' , true ); ?></option>
		<option value="1"<?php echo $value == 1 ? ' selected="selected"' : '';?>><?php echo JText::_( 'PLG_FIELDS_GENDER_SELECT_MALE' , true );?></option>
		<option value="2"<?php echo $value == 2 ? ' selected="selected"' : '';?>><?php echo JText::_( 'PLG_FIELDS_GENDER_SELECT_FEMALE' , true ); ?></option>
	</select>
	<?php } ?>

	<div class="o-radio o-radio--inline">
		<input type="radio" value="1" name="<?php echo $inputName; ?>" id="gender-male" <?php echo $value == 1 ? 'checked="checked"' : '';?> data-field-gender-select />
		<label for="gender-male"><?php echo JText::_('PLG_FIELDS_GENDER_SELECT_MALE'); ?></label>
	</div>

	<div class="o-radio o-radio--inline">
		<input type="radio" value="2" name="<?php echo $inputName; ?>" id="gender-female" <?php echo $value == 2 ? 'checked="checked"' : '';?> data-field-gender-select />
		<label for="gender-female"><?php echo JText::_('PLG_FIELDS_GENDER_SELECT_FEMALE'); ?></label>
	</div>

	<?php if ($params->get('custom')) { ?>
	<div class="o-radio o-radio--inline">
		<input type="radio" value="3" name="<?php echo $inputName; ?>" id="gender-custom" <?php echo $value == 3 ? 'checked="checked"' : '';?> data-field-gender-select data-field-gender-select-custom />
		<label for="gender-custom"><?php echo JText::_('PLG_FIELDS_GENDER_SELECT_CUSTOM'); ?></label>
	</div>
	<?php } ?>
	
	<div class="es-fields-error-note" data-field-error></div>
</div>
