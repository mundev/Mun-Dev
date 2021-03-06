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

<div class="es-container <?php echo !$feeds ? ' is-empty' : '';?>" data-es-container data-feeds>
	<div class="es-sidebar" data-sidebar>
		<?php if ($user->isViewer()) { ?>
		<a href="javascript:void(0);" class="btn btn-es-primary btn-block t-lg-mb--xl" data-feeds-create><?php echo JText::_('APP_FEEDS_NEW_FEED'); ?></a>
		<?php } ?>

		<div class="es-side-widget">
			<?php echo $this->html('widget.title', 'COM_ES_STATISTICS'); ?>

			<div class="es-side-widget__bd">
				<ul class="o-nav o-nav--stacked">
					<li class="o-nav__item t-lg-mb--sm">
						<span class="o-nav__link t-text--muted">
							<i class="es-side-widget__icon fa fa-rss t-lg-mr--md"></i>
							<b><?php echo $total;?></b> <?php echo JText::_('COM_ES_FEEDS');?>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="es-content">

		<?php echo $this->html('cover.user', $user, 'apps.' . $this->vars['app']->element); ?>

		<?php echo $this->html('html.snackbar', 'APP_FEEDS_USER_TITLE' , 'h2'); ?>

		<div data-feeds-list>
			<?php if ($feeds) { ?>
				<?php foreach ($feeds as $feed) { ?>
					<?php echo $this->output('apps/user/feeds/profile/item', array('feed' => $feed, 'user' => $user)); ?>
				<?php } ?>
			<?php } ?>
		</div>

		<?php echo $this->html('html.emptyBlock', 'APP_FEEDS_NO_FEED_YET', 'fa-rss-square'); ?>
	</div>
</div>