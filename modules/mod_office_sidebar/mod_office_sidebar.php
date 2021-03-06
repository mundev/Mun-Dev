<?php
/**
* @package      Office Template
* @copyright    Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

jimport('joomla.filesystem.file');

// Include main engine
$engine = JPATH_ADMINISTRATOR . '/components/com_easysocial/includes/easysocial.php';
$exists = JFile::exists($engine);

if (!$exists) {
	echo '<div class="alert alert-error">EasySocial is not available.</div>';
	return;
}

$config = ES::config();
$lib = ES::modules($module);
$loggedin = $lib->my->isLoggedIn();

require JModuleHelper::getLayoutPath('mod_office_sidebar', $params->get('layout', 'default'));