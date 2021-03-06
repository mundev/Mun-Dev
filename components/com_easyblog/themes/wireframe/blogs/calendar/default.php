<?php
/**
* @package		EasyBlog
* @copyright	Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="eb-calendar-topbar">
	<div class="eb-calendar-topbar__date" data-calendar-topbar-date>
		<?php echo $date->format(JText::_('COM_EB_CALENDAR_HEADING'));?>
	</div>
	<a href="<?php echo $listViewUrl;?>" class="eb-calendar-topbar__toggle" data-calendar-toggle-view><?php echo JText::_('COM_EASYBLOG_SWITCH_TO_LIST_VIEW'); ?></a>
</div>

<div class="eb-calendar <?php echo $this->isMobile() ? 'is-mobile' : '';?>" data-calendar-container></div>

<div style="display: none;" data-calendar-loader-template>
	<div class="eb-empty eb-calendar-loader" data-calender-loader>
		<i class="fa fa-refresh fa-spin"></i> <span><?php echo JText::_('COM_EASYBLOG_CALENDAR_LOADING_CALENDAR'); ?></span>
	</div>
</div>
