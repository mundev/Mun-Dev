<?php
/**
* @package		Komento
* @copyright	Copyright (C) 2010 - 2016 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Komento is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

class KomentoProfilesCommunitybuilder extends KomentoBase
{
	protected $profile = null;

	public function __construct($profile)
	{
		parent::__construct();

		if (!$this->exists()) {
			return;
		}

		$this->profile = $profile;

		cbimport('cb.database');
		cbimport('cb.tables');
		cbimport('cb.tabs');
	}

	public function exists()
	{
		$filename = JPATH_ADMINISTRATOR . '/components/com_comprofiler/plugin.foundation.php';

		if (!JFile::exists($filename)) {
			return false;
		}

		require_once($filename);

		return true;
	}

	public function getAvatar()
	{
		ob_start();
		$user = CBuser::getInstance($this->profile->id);
		$link = $user->getField('avatar', null, 'csv', 'none', 'list');
		ob_end_clean();

		if (!$link) {
			$obj = new KomentoProfilesDefault($this->profile);
			$link = $obj->getAvatar();
		}

		return $link;
	}

	public function getLink()
	{
		return cbSef( 'index.php?option=com_comprofiler&amp;task=userProfile&amp;user='. $this->profile->id );
	}
}