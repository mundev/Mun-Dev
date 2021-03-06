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

$mainRouting = ($this->config->get('main_routing') == 'currentactive') ? 'default' : $this->config->get('main_routing');
?>
<div class="row">
	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', 'COM_EASYBLOG_SETTINGS_WORKFLOW_ADVANCE_SETTINGS_TITLE', 'COM_EASYBLOG_SETTINGS_WORKFLOW_ADVANCE_SETTINGS_INFO'); ?>

			<div class="panel-body">
				<div class="form-group">
					<?php echo $this->html('form.label', 'COM_EASYBLOG_SETTINGS_WORKFLOW_ROUTING_BEHAVIOR', 'routing_behavior'); ?>

					<div class="col-md-7">
						<div class="list-group">
							<div class="list-group-item">
								<div class="radio">
									<input type="radio" name="main_routing" value="default" id="defaultRouting" data-routing-type <?php echo $mainRouting == 'default' ? ' checked="checked"' : '';?> style="margin-top: 2px;" />
									<label for="defaultRouting">
										<b class="list-group-item-heading"><?php echo JText::_('COM_EASYBLOG_SETTINGS_WORKFLOW_ROUTING_BEHAVIOR_DEAULT');?></b>
										<p class="list-group-item-text">
											<?php echo JText::_('COM_EASYBLOG_SETTINGS_WORKFLOW_ROUTING_BEHAVIOR_DEAULT_DESC');?>
										</p>
									</label>
								</div>

							</div>

							<div class="list-group-item">
								<div class="radio">
									<input type="radio" name="main_routing" value="menuitemid" id="useMenuRouting" data-routing-type <?php echo $mainRouting == 'menuitemid' ? ' checked="checked"' : '';?> style="margin-top: 2px;" />
									<label for="useMenuRouting">
										<b class="list-group-item-heading"><?php echo JText::_('COM_EASYBLOG_SETTINGS_WORKFLOW_ROUTING_BEHAVIOR_USE_MENUITEM');?></b>
										<p class="list-group-item-text">
											<?php echo JText::_('COM_EASYBLOG_SETTINGS_WORKFLOW_ROUTING_BEHAVIOR_USE_MENUITEM_DESC');?>
										</p>
									</label>

									<div class="row mt-10">
										<div class="col-sm-8">
											<div class="input-group">
												<span class="input-group-addon"><?php echo JText::_('COM_EASYBLOG_SETTINGS_WORKFLOW_ENTER_MENU_ID');?></span>
												<input type="text" name="main_routing_itemid" class="form-control text-center" value="<?php echo $this->config->get('main_routing_itemid' );?>" />
											</div>
										</div>
									</div>
								</div>


							</div>

							<div class="list-group-item">
								<?php echo JText::_('COM_EASYBLOG_SETTINGS_WORKFLOW_ROUTING_BEHAVIOR_NOTE'); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="alert alert-warning mt-20">
					<?php echo JText::_('COM_EASYBLOG_SETTINGS_WORKFLOW_ROUTING_BEHAVIOR_DEPRECATED_NOTE'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', 'COM_EASYBLOG_SETTINGS_SEO_ENTRY_ROUTING_VIEW', 'COM_EASYBLOG_SETTINGS_SEO_ENTRY_ROUTING_VIEW_INFO'); ?>

			<div class="panel-body">
				<div class="form-group">
					<?php echo $this->html('form.label', 'COM_EASYBLOG_SETTINGS_SEO_ENTRY_SELECT_ROUTING_VIEW', 'main_routing_entry'); ?>

					<div class="col-md-7">
						<select name="main_routing_entry" id="main_routing_entry" class="form-control">
							<option value="categories"<?php echo $this->config->get('main_routing_entry') == 'categories' ? ' selected="selected"' : '';?>><?php echo JText::_('COM_EASYBLOG_SETTINGS_SEO_ENTRY_ROUTING_CATEGORY');?></option>
							<option value="blogger"<?php echo $this->config->get('main_routing_entry') == 'blogger' ? ' selected="selected"' : '';?>><?php echo JText::_('COM_EASYBLOG_SETTINGS_SEO_ENTRY_ROUTING_AUTHOR');?></option>
							<option value="teamblog"<?php echo $this->config->get('main_routing_entry') == 'teamblog' ? ' selected="selected"' : '';?>><?php echo JText::_('COM_EASYBLOG_SETTINGS_SEO_ENTRY_ROUTING_TEAMBLOG');?></option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
