<?php
/**
* @package		EasyDiscuss
* @copyright	Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasyDiscuss is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

class EasyDiscussOauth extends EasyDiscuss
{
	/**
	 * New way to retrieve the oauth client
	 *
	 * @since	4.0
	 * @access	public	
	 */
	public function getClient($type)
	{
		return $this->createClient($type);
	}

	/**
	 * Try to get the consumer type based on the given type.
	 *
	 * @param	string	$type	The client app type.
	 * @param	string	$api	The API key required for most oauth clients
	 * @param	string	$secret	The API secret required for oauth to work
	 * @param	string	$callback	The callback URL.
	 *
	 * @return	oauth objects.
	 **/
	public function getConsumer($type, $api, $secret, $callback)
	{
		static $clients = array();

		if (!isset($clients[$type])) {

			$clients[$type] = $this->createClient($type, $api, $secret, $callback);
		}

		return $clients[$type];
	}

	/**
	 * Creates a new oauth client object
	 *
	 * @since	4.0
	 * @access	public	
	 */
	public function createClient($type = '', $api = '', $secret = '', $callback = '')
	{
		$type = strtolower($type);
		
		$file = __DIR__ . '/consumers/' . $type . '/' . $type . '.php';

		require_once($file);

		$class = 'EasyDiscuss' . ucfirst($type);

		if (!class_exists($class)) {
			return false;
		}

		$client = new $class($api, $secret, $callback);

		return $client;
	}

	/**
	 * Method to show Facebook oauth redirect URI for backend
	 *
	 * @since   4.0.23
	 * @access  public
	 */
	public function getOauthRedirectURI($type = 'facebook')
	{
		$callbackUri = array();

		if ($type == 'facebook') {
			$callbackUri[] = rtrim(JURI::root(), '/') . '/administrator/index.php?option=com_easydiscuss&controller=autoposting&task=grant&type=facebook';
		}

		if ($type == 'linkedin') {
			$callbackUri[] = EDR::getRoutedUrl('index.php?option=com_easydiscuss&view=auth&layout=linkedin', true, true, true, true);
		}

		if ($type == 'twitter') {
			$callbackUri[] = JURI::root() . 'index.php?option=com_easydiscuss';
			$callbackUri[] = rtrim(JURI::root(), '/') . '/administrator/index.php?option=com_easydiscuss';
		}

		return $callbackUri;
	}	
}
