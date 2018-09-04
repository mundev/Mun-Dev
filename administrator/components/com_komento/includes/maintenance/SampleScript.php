<?php
/**
* @package      Komento
* @copyright    Copyright (C) 2010 - 2016 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* Komento is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

require_once(KOMENTO_HELPERS . '/maintenance/dependencies.php');

class KomentoMaintenanceScriptSampleScript extends KomentoMaintenanceScript
{
	public static $title = 'Sample Script';

	public static $description = 'This is a sample script';

	public function main()
	{
		// Main codes here
	}
}