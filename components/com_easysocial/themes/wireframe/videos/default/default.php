<?php
/**
* @package      EasySocial
* @copyright    Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="wrapper-for-full-height">
	<?php if (!$browseView) { ?>
		<?php echo $adapter->getMiniHeader(); ?>
	<?php } ?>

	<?php echo $this->html('responsive.toggle'); ?>

	<div data-es-videos class="es-container es-videos" data-videos-listing data-es-container>
		
		<?php echo $this->includeTemplate('site/videos/default/sidebar'); ?>

		<div class="es-content">

			<?php echo $this->render('module' , 'es-videos-before-contents'); ?>

			<div data-wrapper>
				<?php echo $this->html('html.loading'); ?>
				
				<div data-videos-result>
					<div>
						<?php echo $this->includeTemplate('site/videos/default/items'); ?>
					</div>
				</div>
			</div>

			<?php echo $this->render('module' , 'es-videos-after-contents'); ?>
		</div>
	</div>
</div>
