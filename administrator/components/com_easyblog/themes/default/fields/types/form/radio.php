<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<?php foreach ($options as $option) { ?>
    <?php if ($option->title && $option->value) { ?>
        <label class="radio-inline">
            <input type="radio" 
            	name="<?php echo $formElement;?>[<?php echo $field->id;?>]" 
            	value="<?php echo $option->value;?>" <?php echo $value == $option->value ? ' checked="checked"' : '';?>
				data-field-class-input-radio
            /> <?php echo JText::_($option->title);?>
        </label>
    <?php } ?>
<?php } ?>