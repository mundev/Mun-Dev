<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<dialog>
	<width>500</width>
	<height>300</height>
	<selectors type="json">
	{
		"{closeButton}" : "[data-close-button]",
		"{insertButton}" : "[data-insert-button]",
		"{videoUrl}": "[data-embed-video-url]",
		"{videoWidth}": "[data-embed-video-width]",
		"{videoHeight}": "[data-embed-video-height]",
		"{noCookie}": "[data-embed-video-nocookie]"
	}
	</selectors>
	<bindings type="javascript">
	{
		"{videoUrl} keyup": function(input, opts) {
			var event = opts[0];

			if (event.keyCode === 13) {
				this.insertButton().click();
				return;
			}
		},
		
		"{closeButton} click": function() {
			this.parent.close();
		}
	}
	</bindings>
	<title><?php echo JText::_('COM_EASYBLOG_DIALOG_MM_EMBED_VIDEO'); ?></title>
	<content>
		<div>
			<div class="eb-embed-video-note mb-20">
				<?php echo JText::_('COM_EASYBLOG_MM_VIDEO_EMBED_DESC');?>
			</div>

			<div class="eb-embed-video-form">
				<div class="form-group row-table">
					<label class="col-cell text-right" style="width: 120px;">
						<?php echo JText::_('COM_EASYBLOG_MM_VIDEO_URL');?>
					</label>
					<div class="col-cell pl-20">
						<input type="text" class="form-control" data-embed-video-url />
					</div>
				</div>

				<div class="form-group row-table">
					<label class="col-cell text-right" style="width: 120px;">
						<?php echo JText::_('COM_EASYBLOG_MM_VIDEO_WIDTH');?>
					</label>
					<div class="col-cell pl-20" style="width: 100px">
						<input type="text" class="form-control text-center" value="<?php echo $this->config->get('max_video_width');?>" data-embed-video-width />
					</div>
					<div class="col-cell pl-15"><?php echo JText::_('COM_EASYBLOG_PIXELS');?></div>
				</div>

				<div class="form-group row-table">
					<label class="col-cell text-right" style="width: 120px;">
						<?php echo JText::_('COM_EASYBLOG_MM_VIDEO_HEIGHT');?>
					</label>
					<div class="col-cell pl-20" style="width: 100px">
						<input type="text" class="form-control text-center" value="<?php echo $this->config->get('max_video_height');?>" data-embed-video-height />
					</div>
					<div class="col-cell pl-15"><?php echo JText::_('COM_EASYBLOG_PIXELS');?></div>
				</div>

				<div class="form-group row-table">
					<label class="col-cell text-right" style="width: 120px;">
						<?php echo JText::_('COM_EB_MM_ENHANCE_PRIVACY');?>
					</label>
					<div class="col-cell pl-20 pt-5" style="width: 80px">
						 <?php echo $this->html('form.toggler', 'youtube_nocookie', false, 'youtube_nocookie', 'data-embed-video-nocookie'); ?>
					</div>
					<div class="col-cell"><?php echo JText::_('COM_EB_MM_ENHANCE_PRIVACY_NOTE');?></div>
				</div>
			</div>
		</div>
	</content>
	<buttons>
		<button data-close-button type="button" class="btn btn-eb-default-o btn--sm"><?php echo JText::_('COM_EASYBLOG_CLOSE_BUTTON'); ?></button>
		<button data-insert-button type="button" class="btn btn-eb-primary btn--sm"><?php echo JText::_('COM_EASYBLOG_EMBED_BUTTON'); ?></button>
	</buttons>
</dialog>
