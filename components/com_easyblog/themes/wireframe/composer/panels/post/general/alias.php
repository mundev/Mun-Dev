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
<div class="o-form-group">
	<label for="blogpassword" class="o-control-label eb-composer-field-label">
		<?php echo JText::_('COM_EASYBLOG_COMPOSER_PANEL_AUTHOR_ALIAS'); ?>
	</label>
	<div class="o-control-input">
		<input class="o-form-control" type="text" id="author_alias" name="author_alias" value="<?php echo $this->html('string.escape', $post->author_alias);?>" 
			placeholder="<?php echo JText::_('COM_EASYBLOG_COMPOSER_PANEL_AUTHOR_ALIAS_PAGE_TITLE_PLACEHOLDER', true);?>" />
	</div>
</div>