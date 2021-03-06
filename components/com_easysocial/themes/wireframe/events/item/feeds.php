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
<?php if ($streamFilter) { ?>
	<div class="es-snackbar es-hashtag">
		<div class="es-snackbar__cell">
			<h1 class="es-snackbar__title"><?php echo JText::_($streamFilter->title);?></h1>
		</div>
		<?php if ($event->canCreateStreamFilter()) { ?>
		<div class="es-snackbar__cell">
			<a 
			data-edit-filter
			data-id="<?php echo $streamFilter->id; ?>"
			data-type="<?php echo $streamFilter->utype; ?>"
			class="pull-right subscribe-rss btn-rss"
			href="<?php echo ESR::events(array('layout' => 'item', 'id' => $event->getAlias(), 'type' => 'filterForm', 'filterId' => $streamFilter->getAlias()));?>">
				<i class="fa fa-pencil"></i>&nbsp; <?php echo JText::_('COM_ES_EDIT');?>
			</a>
		</div>
		<?php } ?>
	</div>
<?php } else if (isset($hashtag) && $hashtag) { ?>
<div class="es-snackbar es-hashtag">
	<div class="es-snackbar__cell">
		<h1 class="es-snackbar__title"><?php echo JText::sprintf('COM_EASYSOCIAL_STREAM_HASHTAG_CURRENTLY_FILTERING' , '<a href="' . ESR::events(array('layout' => 'item', 'id' => $event->getAlias(), 'tag' => $hashtagAlias )) . '">#' . $hashtag . '</a>'); ?></h1>
	</div>
	<?php if ($event->canCreateStreamFilter()) { ?>
	<div class="es-snackbar__cell">
		<a href="javascript:void(0)"
		   class="pull-right subscribe-rss btn-rss"
		   data-hashtag-filter-save
		   data-tag="<?php echo $hashtag; ?>"
		   data-uid="<?php echo $event->id; ?>">
			<i class="fa fa-pencil"></i>&nbsp; <?php echo JText::_('COM_ES_SAVE');?>
		</a>
	</div>
	<?php } ?>
</div>
<?php } ?>

<?php echo $stream->html(); ?>