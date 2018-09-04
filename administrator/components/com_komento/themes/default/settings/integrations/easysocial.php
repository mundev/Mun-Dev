<?php
/**
* @package		Komento
* @copyright	Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Komento is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="row">
	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', 'COM_KOMENTO_SETTINGS_EASYSOCIAL'); ?>
			
			<div class="panel-body">
				<p class="clearfix">
					<img src="<?php echo JURI::root(); ?>media/com_komento/images/integrations/easysocial.png" align="left" width="64" class="t-lg-mr--xl" />
					<?php echo JText::_('COM_KOMENTO_WHAT_IS_EASYSOCIAL'); ?>
					<br /><br />
					<a href="https://stackideas.com/easysocial" class="btn btn-kt-primary btn-sm" target="_blank"><?php echo JText::_('COM_KOMENTO_GET_EASYSOCIAL'); ?></a>
				</p>

				<?php echo $this->html('settings.toggle', 'enable_easysocial_points', 'COM_KOMENTO_SETTINGS_ACTIVITIES_ENABLE_EASYSOCIAL_POINTS'); ?>
				<?php echo $this->html('settings.toggle', 'enable_easysocial_badges', 'COM_KOMENTO_SETTINGS_ACTIVITIES_ENABLE_EASYSOCIAL_BADGES'); ?>
				<?php echo $this->html('settings.toggle', 'easysocial_profile_popbox', 'COM_KOMENTO_LAYOUT_AVATAR_USE_EASYSOCIAL_PROFILE_POPBOX'); ?>
				<?php echo $this->html('settings.toggle', 'enable_easysocial_stream_comment', 'COM_KOMENTO_SETTINGS_ACTIVITIES_ENABLE_EASYSOCIAL_STREAM_COMMENT'); ?>
				<?php echo $this->html('settings.toggle', 'enable_easysocial_stream_like', 'COM_KOMENTO_SETTINGS_ACTIVITIES_ENABLE_EASYSOCIAL_STREAM_LIKE'); ?>
				<?php echo $this->html('settings.toggle', 'enable_easysocial_sync_comment', 'COM_KOMENTO_SETTINGS_ACTIVITIES_ENABLE_EASYSOCIAL_SYNC_COMMENT'); ?>
				<?php echo $this->html('settings.toggle', 'enable_easysocial_sync_like', 'COM_KOMENTO_SETTINGS_ACTIVITIES_ENABLE_EASYSOCIAL_SYNC_LIKE'); ?>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="panel">
			<?php echo $this->html('panel.heading', 'COM_KOMENTO_SETTINGS_EASYSOCIAL_NOTIFICATIONS'); ?>
			
			<div class="panel-body">
				<?php echo $this->html('settings.toggle', 'notification_es_enable', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_ENABLE'); ?>
				<?php echo $this->html('settings.toggle', 'notification_es_event_new_comment', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_EVENT_NEW_COMMENT'); ?>
				<?php echo $this->html('settings.toggle', 'notification_es_event_new_reply', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_EVENT_NEW_REPLY'); ?>
				<?php echo $this->html('settings.toggle', 'notification_es_event_new_like', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_EVENT_NEW_LIKE'); ?>
				<?php echo $this->html('settings.toggle', 'notification_es_to_author', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_TO_AUTHOR'); ?>
				<?php echo $this->html('settings.toggle', 'notification_es_to_participant', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_TO_PARTICIPANT'); ?>

				<div class="form-group">
					<?php echo $this->html('panel.label', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_TO_USERGROUP_COMMENT'); ?>

					<div class="col-md-7">
						<?php echo $this->html('tree.groups' , 'notification_es_to_usergroup_comment', $this->config->get('notification_es_to_usergroup_comment'), array()); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo $this->html('panel.label', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_TO_USERGROUP_REPLY'); ?>

					<div class="col-md-7">
						<?php echo $this->html('tree.groups' , 'notification_es_to_usergroup_reply', $this->config->get('notification_es_to_usergroup_reply'), array()); ?>
					</div>
				</div>

				<div class="form-group">
					<?php echo $this->html('panel.label', 'COM_KOMENTO_SETTINGS_NOTIFICATION_EASYSOCIAL_TO_USERGROUP_LIKE'); ?>

					<div class="col-md-7">
						<?php echo $this->html('tree.groups' , 'notification_es_to_usergroup_like', $this->config->get('notification_es_to_usergroup_like'), array()); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
