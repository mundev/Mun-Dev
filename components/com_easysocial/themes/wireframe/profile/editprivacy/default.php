<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>

<?php echo $this->html('responsive.toggle'); ?>

<div class="es-container" data-es-container data-edit-privacy>
	<div class="es-sidebar" data-sidebar>
		<?php echo $this->render('module', 'es-profile-editprivacy-sidebar-top'); ?>

		<div class="es-side-widget">
			<?php echo $this->html('widget.title', 'COM_EASYSOCIAL_PROFILE_SIDEBAR_PRIVACY'); ?>

			<div class="es-side-widget__bd">
				<ul class="o-tabs o-tabs--stacked">
				<?php $i = 0; ?>
				<?php  foreach ($privacy as $group) {  ?>
					<li class="o-tabs__item <?php echo ($i == 0 && !$activeTab) || ($activeTab == $group->element) ? 'active' : '';?>" data-filter-item="<?php echo $group->element; ?>">
						<a class="o-tabs__link" href="javascript:void(0);"><?php echo $group->title; ?></a>
					</li>
					<?php $i++; ?>
				<?php } ?>
				</ul>
			</div>
		</div>

		<div class="es-side-widget">
			<?php echo $this->html('widget.title', 'COM_EASYSOCIAL_PROFILE_SIDEBAR_PRIVACY_BLOCKED_USERS'); ?>

			<div class="es-side-widget__bd">
				<ul class="o-tabs o-tabs--stacked">
					<li class="o-tabs__item" data-filter-item="blocked">
						<a class="o-tabs__link" href="javascript:void(0);"><?php echo JText::_('COM_EASYSOCIAL_PROFILE_SIDEBAR_PRIVACY_MANAGE_BLOCKED_USERS'); ?></a>
					</li>
				</ul>
			</div>
		</div>

		<div class="es-side-widget">
			<?php echo $this->html('widget.title', 'COM_EASYSOCIAL_OTHER_LINKS');?>

			<div class="es-side-widget__bd">
				<ul class="o-tabs o-tabs--stacked">
					<li class="o-tabs__item">
						<a href="<?php echo ESR::profile(array('layout' => 'edit'));?>" class="o-tabs__link"><?php echo JText::_('COM_EASYSOCIAL_TOOLBAR_EDIT_PROFILE');?></a>
					</li>
					<li class="o-tabs__item">
						<a href="<?php echo ESR::profile(array('layout' => 'editNotifications'));?>" class="o-tabs__link"><?php echo JText::_('COM_EASYSOCIAL_MANAGE_ALERTS');?></a>
					</li>
				</ul>
			</div>
		</div>

		<?php echo $this->render('module', 'es-profile-editprivacy-sidebar-bottom'); ?>
	</div>


	<div class="es-content">
		<?php echo $this->render('module', 'es-profile-editprivacy-before-contents'); ?>

		<form method="post" action="<?php echo JRoute::_('index.php');?>" class="es-forms">

			<div class="tab-content">
				<?php if ($privacy) { ?>
					<?php $i = 0; ?>
					<?php foreach ($privacy as $group) { ?>
					<div class="tab-content__item <?php echo ($i == 0 && !$activeTab) || ($activeTab && $activeTab == $group->element) ? 'is-active' : '';?>" data-contents data-type="<?php echo $group->element; ?>">
						<div class="es-forms__group">
							<div class="es-forms__title">
								<?php echo $this->html('form.title', $group->title); ?>
							</div>

							<div class="es-forms__content">
								<p class="privacy-contents__title">
									<?php echo $group->description;?>
								</p>

								<div class="o-form-horizontal">
								<?php foreach ($group->items as $item) { ?>
									<?php if (!$item) { continue; } ?>
									<div class="o-form-group" data-privacy-item>
										<?php echo $this->html('form.label', $item->label, 3, true, $item->tips); ?>

										<div class="o-control-input">

											<select name="privacy[<?php echo $item->groupKey;?>][<?php echo $item->rule;?>]" class="o-form-control privacySelection" autocomplete="off" data-privacy-select>
												<?php foreach ($item->options as $option => $value) { ?>
													<?php
														if ($option == 'field') {
															// User are not allow to pre-configure custom field privacy.
															continue;
														}
													?>
													<option value="<?php echo $option;?>"<?php echo $value ? ' selected="selected"' : '';?>>
														<?php echo JText::_('COM_EASYSOCIAL_PRIVACY_OPTION_' . strtoupper($option));?>
													</option>
												<?php } ?>
											</select>

											<div class="es-privacy-contents-custom">
												<a href="javascript:void(0);" class="t-text--muted" style="<?php echo !$item->hasCustom ? 'display:none;' : '';?>" data-privacy-custom-edit-button>
													<i class="fa fa-cog"></i>
												</a>

												<div class="dropdown-menu dropdown-menu-left privacy-custom-menu" style="display:none;" data-privacy-custom-form>
													<div class="t-lg-mb--md ">
														<div class="">
															<?php echo JText::_('COM_EASYSOCIAL_PRIVACY_CUSTOM_DIALOG_NAME'); ?>
															<a href="javascript:void(0);" class="pull-right" data-privacy-custom-hide-button>
																<i class="fa fa-remove " title="<?php echo JText::_('COM_EASYSOCIAL_PRIVACY_CUSTOM_DIALOG_HIDE' , true );?>"></i>
															</a>
														</div>
													</div>
													<div class="textboxlist" data-textfield>
														<?php if ($item->hasCustom) { ?>
															<?php foreach ($item->customUsers as $friend) { ?>
															<div class="textboxlist-item" data-id="<?php echo $friend->id; ?>" data-title="<?php echo $friend->getName(); ?>" data-textboxlist-item>
																<span class="textboxlist-itemContent" data-textboxlist-itemContent><?php echo $friend->getName(); ?><input type="hidden" name="items" value="<?php echo $friend->id; ?>" /></span>
																<a class="textboxlist-itemRemoveButton" href="javascript: void(0);" data-textboxlist-itemRemoveButton></a>
															</div>
															<?php } ?>
														<?php } ?>
														<input type="text" class="textboxlist-textField" data-textboxlist-textField placeholder="<?php echo JText::_('COM_EASYSOCIAL_PRIVACY_CUSTOM_DIALOG_ENTER_NAME'); ?>" autocomplete="off" />
													</div>
												</div>
											</div>



											<input type="hidden" name="privacyID[<?php echo $item->groupKey;?>][<?php echo $item->rule; ?>]" value="<?php echo $item->id . '_' . $item->mapid;?>" />
											<input type="hidden" name="privacyOld[<?php echo $item->groupKey;?>][<?php echo $item->rule; ?>]" value="<?php echo $item->selected; ?>" />
											<input type="hidden" data-hidden-custom name="privacyCustom[<?php echo $item->groupKey;?>][<?php echo $item->rule; ?>]" value="<?php echo implode(',', $item->customIds); ?>" />
										</div>
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<?php $i++;?>
					<?php } ?>
				<?php } ?>

				<div class="tab-content__item" data-contents data-type="blocked">
					<div class="es-forms__group <?php echo !$blockedUsers ? 'is-empty' : '';?>">
						<div class="es-forms__title">
							<?php echo $this->html('form.title', 'COM_EASYSOCIAL_MANAGE_BLOCKED_USERS'); ?>
						</div>

						<div class="es-forms__content">
							<?php if ($blockedUsers) { ?>
								<?php foreach ($blockedUsers as $block) { ?>
								<div class="es-users-item" data-id="<?php echo $block->user->id;?>">
									<div class="o-grid">
										<div class="o-grid__cell">
											<div class="o-flag">
												<div class="o-flag__image">
													<?php echo $this->html('avatar.user', $block->user); ?>
												</div>

												<div class="o-flag__body">
													<a href="<?php echo $block->user->getPermalink();?>" class="es-user-name"><?php echo $block->user->getName();?></a>
													<div class="es-user-meta t-text--muted">
														<?php if (!$block->reason) { ?>
															<?php echo JText::_('COM_EASYSOCIAL_BLOCKED_USER_NO_REASONS_PROVIDED'); ?>
														<?php } else { ?>
															<?php echo $block->reason;?>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>

										<div class="o-grid__cell--auto-size">
											<?php echo ES::blocks()->form($block->user->id, true); ?>
										</div>
									</div>
								</div>
								<?php } ?>
							<?php } ?>

							<?php echo $this->html('html.emptyBlock', 'COM_EASYSOCIAL_PRIVACY_BLOCKED_NO_USERS_CURRENTLY', 'fa-users'); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="es-forms__actions">
				<div class="o-form-actions" data-form-actions>
					<button class="btn btn-es-primary-o t-lg-pull-right" data-profile-notifications-save><?php echo JText::_('COM_EASYSOCIAL_SAVE_BUTTON');?></button>

					<div class="t-lg-pull-right t-lg-mr--xl">
						<div class="o-checkbox">
							<input type="checkbox" value="1" name="privacyReset" id="reset-privacy" />
							<label for="reset-privacy">
								 <?php echo JText::_('COM_EASYSOCIAL_PRIVACY_RESET_DESCRIPTION'); ?>
							</label>
						</div>
					</div>
				</div>
			</div>

			<?php echo $this->html('form.action', 'profile', 'savePrivacy'); ?>
			<input type="hidden" name="activeTab" value="<?php echo $activeTab;?>" data-privacy-active />
		</form>

		<?php echo $this->render('module', 'es-profile-editprivacy-after-contents'); ?>
	</div>
</div>

