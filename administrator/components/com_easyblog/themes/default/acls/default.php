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
<form action="index.php?option=com_easyblog" method="post" name="adminForm" id="adminForm" data-grid-eb>

	<div class="app-filter-bar">
		<div class="app-filter-bar__cell">
			<?php echo $this->html('filter.search', $filter->search); ?>
		</div>

		<div class="app-filter-bar__cell app-filter-bar__cell--divider-left"></div>

		<div class="app-filter-bar__cell app-filter-bar__cell--divider-left app-filter-bar__cell--last t-text--center">
			<div class="app-filter-bar__filter-wrap">
				<?php echo $this->html('filter.limit', $limit); ?>
			</div>
		</div>
	</div>

	<div class="panel-table">
		<table class="app-table table table-striped table-eb table-hover">
			<thead>
				<tr>
					<th>
						<?php echo JHTML::_('grid.sort', 'COM_EASYBLOG_GROUP_NAME', 'a.`name`', $sort->orderDirection, $sort->order ); ?>
					</th>
					<th width="5%" class="center">
						<?php echo JHTML::_('grid.sort', 'COM_EASYBLOG_ID', 'a.`id`', $sort->orderDirection, $sort->order ); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php if( $rulesets ){ ?>
					<?php $i = 0; ?>
					<?php foreach( $rulesets as $ruleset ){ ?>
					<tr>
						<td>
							<?php echo str_repeat('<span class="gi">|&mdash;</span>', $ruleset->level) ?>
							<a href="index.php?option=com_easyblog&view=acls&layout=form&id=<?php echo $ruleset->id;?>"><?php echo $ruleset->name; ?></a>
						</td>
						<td class="center">
							<?php echo $ruleset->id;?>
						</td>
					</tr>
					<?php } ?>

				<?php } else { ?>
				<tr>
					<td colspan="3" class="empty">
						<?php echo JText::_('COM_EASYBLOG_ACLS_NO_ACL_DEFINED_YET'); ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3">
						<?php echo $pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>

	<?php echo JHTML::_('form.token'); ?>
	<input type="hidden" name="option" value="com_easyblog" />
	<input type="hidden" name="view" value="acls" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="filter_order" value="<?php echo $sort->order; ?>" />
	<input type="hidden" name="filter_order_Dir" value="" />
	<input type="hidden" name="boxchecked" value="0" />
</form>
