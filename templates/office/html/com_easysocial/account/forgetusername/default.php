<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2016 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="si-login-wrapper">
	<div class="si-login">
		
		<div class="si-login__hd"></div>

		<div class="si-login__bd">

			<form class="si-login__form" action="<?php echo JRoute::_('index.php');?>" method="post">
				<div class="si-login__fields">
					<div class="si-login__form-title"><b><?php echo JText::_('COM_EASYSOCIAL_PROFILE_REMIND_USERNAME');?></b></div>
					<p class="si-login__form-desc t-lg-mt--lg"><?php echo JText::_('COM_EASYSOCIAL_PROFILE_REMIND_USERNAME_DESC');?></p>

					<fieldset class="t-lg-mt--lg">
						<div class="o-form-group t-text--center">
							<label for="es-email"><?php echo JText::_('COM_EASYSOCIAL_PROFILE_REMIND_USERNAME_EMAIL'); ?></label>
							<input type="text" placeholder="<?php echo JText::_('COM_EASYSOCIAL_PROFILE_REMIND_USERNAME_EMAIL_PLACEHOLDER', true);?>" name="es-email" id="es-email" class="o-form-control" />
						</div>

						<div class="">
							<button type="submit" class="btn btn-es-primary btn-block"><?php echo JText::_('COM_EASYSOCIAL_SEND_USERNAME_BUTTON');?></button>
						</div>
					</fieldset>
				</div>
				
				<input type="hidden" name="option" value="com_easysocial" />
				<input type="hidden" name="controller" value="account" />
				<input type="hidden" name="task" value="remindUsername" />
				<?php echo $this->html( 'form.token' ); ?>
			</form>
		</div>
	</div>
</div>
