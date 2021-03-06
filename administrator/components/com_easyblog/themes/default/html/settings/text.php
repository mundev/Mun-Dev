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
<div class="form-group">
	<label for="page_title" class="col-md-5">
		<?php echo JText::_($title);?>

		<i data-html="true" data-placement="top" data-title=" <?php echo JText::_($title);?>" data-content=" <?php echo JText::_($desc);?>" data-eb-provide="popover" class="fa fa-question-circle pull-right"></i>
	</label>

	<div class="col-md-7">
		<?php if ($size) { ?>
		<div class="row">
			<div class="col-sm-<?php echo $size;?>">
		<?php } ?>

			<?php if ($prefix || $postfix) { ?>
			<div class="input-group">
			<?php }?>

				<?php if ($prefix) { ?>
				<span class="input-group-addon"><?php echo JText::_($prefix); ?></span>
				<?php } ?>

				<input type="<?php echo $type;?>" name="<?php echo $name;?>" class="form-control <?php echo $class;?>" value="<?php echo $this->config->get($name);?>" <?php echo $attributes;?>/>

				<?php if ($postfix) { ?>
				<span class="input-group-addon"><?php echo JText::_($postfix); ?></span>
				<?php } ?>

			<?php if ($prefix || $postfix) { ?>
			</div>
			<?php } ?>

		<?php if ($size) { ?>
			</div>
		</div>
		<?php } ?>

		<?php if ($instructions) { ?>
		<div class="alert alert-warning mt-10">
			<?php echo $instructions;?>
		</div>
		<?php } ?>
	</div>
</div>