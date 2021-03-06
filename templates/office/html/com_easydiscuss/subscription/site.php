<?php
/**
* @package		EasyDiscuss
* @copyright	Copyright (C) 2010 - 2015 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div data-subscription-form>
	<?php if ($subscribed && !$this->my->guest) { ?>
		<a class="via-email has-tip" href="javascript:void(0);" 
			data-ed-unsubscribe
			data-sid="<?php echo $sid; ?>"
			data-type="<?php echo $type; ?>"
			data-cid="<?php echo $cid;?>"
			data-ed-provide="tooltip"
			data-original-title="<?php echo JText::_('COM_EASYDISCUSS_UNSUBSCRIBE');?>"
		>
			<i class="ed-subscribe__icon t-lg-mr--sm fa fa-envelope"></i><span>&nbsp;<?php echo JText::_('COM_EASYDISCUSS_UNSUBSCRIBE');?></span>
		</a>
	<?php } else { ?>
		<a class="via-email has-tip" href="javascript:void(0);" 
			data-ed-subscribe
			data-type="<?php echo $type; ?>"
			data-cid="<?php echo $cid;?>"
			data-ed-provide="tooltip"
			data-original-title="<?php echo JText::_('COM_EASYDISCUSS_SUBSCRIBE_VIA_EMAIL');?>"
		>
			<i class="ed-subscribe__icon t-lg-mr--sm fa fa-envelope"></i><span>&nbsp;<?php echo JText::_('COM_EASYDISCUSS_SUBSCRIBE_VIA_EMAIL');?></span>
		</a>
	<?php } ?>
</div>