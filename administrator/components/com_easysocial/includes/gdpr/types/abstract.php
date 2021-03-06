<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

abstract class SocialGdprAbstract extends EasySocial
{
	public $userId = null;
	public $type = null;
	public $params = null;
	public $user = null;

	public $path = null;

	abstract protected function execute(SocialGdprSection &$section);

	public function __construct(SocialUser $user, $params)
	{
		parent::__construct();

		$this->user = $user;
		$this->userId = $this->user->id;
		$this->params = $params;
	}

	/**
	 * Determines the date format that should be used
	 *
	 * @since	2.2
	 * @access	public
	 */
	public function getDateFormat()
	{
		$format = JText::_('DATE_FORMAT_LC2');

		return $format;
	}

	/**
	 * Determines the generic limit to process items
	 *
	 * @since	2.2
	 * @access	public
	 */
	public function getLimit($defaultLimit = 15)
	{
		$limit = (int) $this->getParams('limit', $defaultLimit);

		return $limit;
	}

	/**
	 * Creates a new template instance
	 *
	 * @since	2.2
	 * @access	public
	 */
	public function getTemplate($id, $type)
	{
		$item = new SocialGdprTemplate();
		$item->id = $id;
		$item->type = $type;
		
		return $item;
	}

	/**
	 * Retrieve params from the adapter
	 *
	 * @since	2.2
	 * @access	public
	 */
	public function getParams($name, $default = false)
	{
		$name = $this->type . '.' . $name;
		return $this->params->get($name, $default);
	}

	/**
	 * Set params on the adapter
	 *
	 * @since	2.2
	 * @access	public
	 */
	public function setParams($name, $value)
	{
		$name = $this->type . '.' . $name;

		return $this->params->set($name, $value);
	}
}
