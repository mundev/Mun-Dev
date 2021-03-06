<?php
/**
* @package      EasySocial
* @copyright    Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<?php echo $this->html('responsive.toggle'); ?>

<div class="es-container" data-es-container data-es-news data-id="<?php echo $cluster->id;?>">
	<div class="es-sidebar" data-sidebar>
		<?php if ($cluster->canCreateNews()) { ?>
			<a href="<?php echo ESR::apps(array('layout' => 'canvas', 'customView' => 'form', 'uid' => $cluster->getAlias(), 'type' => $cluster->getType(), 'id' => $app->getAlias()));?>" class="btn btn-es-primary btn-block t-lg-mb--xl">
				<?php echo JText::_('APP_GROUP_NEWS_NEW'); ?>
			</a>
		<?php } ?>

		<div class="es-side-widget">
			<?php echo $this->html('widget.title', 'COM_ES_STATISTICS'); ?>

			<div class="es-side-widget__bd">
				<ul class="o-nav o-nav--stacked">
					<li class="o-nav__item t-lg-mb--sm">
						<span class="o-nav__link t-text--muted" href="javasc">
							<i class="es-side-widget__icon fa fa-bullhorn t-lg-mr--md"></i>
							<?php echo JText::sprintf('COM_ES_STAT_ANNOUNCEMENTS', $cluster->getTotalNews()); ?>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="es-content">
		<div class="app-contents<?php echo !$items ? ' is-empty' : '';?>" data-news-wrapper>
			<?php echo $this->html('html.loading'); ?>
			<?php echo $this->html('html.emptyBlock', 'APP_GROUP_NEWS_EMPTY', 'fa-database'); ?>

			<div data-news-contents>
				<?php foreach ($items as $news) { ?>
					<?php echo $this->loadTemplate('site/news/default/items', array('news' => $news, 'params' => $params, 'cluster' => $cluster)); ?>
				<?php } ?>

				<?php echo $pagination->getListFooter('site'); ?>
			</div>
		</div>
	</div>
</div>