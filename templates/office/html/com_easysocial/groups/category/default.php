<?php
/**
* @package      EasySocial
* @copyright    Copyright (C) 2010 - 2016 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="es-group-category">
	<?php echo $this->html('responsive.toggle'); ?>

	<div class="es-container" data-es-groups-category data-es-container>
		<div class="es-sidebar">

			<!-- do not remove this element. This element is needed for the stream loodmore to work properly -->
			<div data-filter-item data-type="groupcategory" data-id="<?php echo $category->id;?>" class="active" data-stream-identifier="<?php echo $stream->getIdentifier(); ?>"></div>

			<?php echo $this->render('module', 'es-groups-category-sidebar-top'); ?>

			<?php echo $this->includeTemplate('site/groups/category/widgets/groups'); ?>
			<?php echo $this->includeTemplate('site/groups/category/widgets/albums'); ?>
			<?php echo $this->includeTemplate('site/groups/category/widgets/members'); ?>

			<?php echo $this->render('module', 'es-groups-category-sidebar-bottom'); ?>
		</div>

		<div class="es-content">
			<div>
				<div class="es-snackbar pull-left">
					<h1 class="es-snackbar__title"><?php echo JText::_('COM_EASYSOCIAL_GROUPS_RECENT_UPDATES'); ?> - <?php echo $category->_('title'); ?></h1>
				</div>
				<div class="pull-right">
					<?php if ($this->my->canCreateGroups() && $category->hasAccess('create', $this->my->profile_id) && !$category->container) { ?>
					<a href="<?php echo ESR::groups(array('controller' => 'groups', 'task' => 'selectCategory', 'category_id' => $category->id));?>" class="btn btn-es-primary btn-sm pull-right">
						<?php echo JText::_('COM_EASYSOCIAL_CREATE_GROUP_BUTTON'); ?>
					</a>
					<?php } ?>
				</div>
			</div>

			<div class="es-content-wrap" data-es-group-item-content>
				<?php echo $stream->html();?>
			</div>
		</div>
	</div>
</div>
