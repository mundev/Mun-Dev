<?php
/**
* @package		Komento
* @copyright	Copyright (C) 2010 - 2016 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

class KomentoPlugin
{
	public $plugin;
	public $pluginpath;
	public $pluginbase;
	public $vars = array();
	public $params;

	public function __construct()
	{
		$this->plugin = strtolower( str_replace( 'KomentoHelper', '', get_class( $this ) ) );

		$this->pluginpath = JPATH_ROOT . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . 'komento';
		$this->pluginbase = rtrim( JURI::root(), '/' ) . '/plugins/komento';

		if( KT::joomlaVersion() >= '1.6' )
		{
			$this->pluginpath .= DIRECTORY_SEPARATOR . $this->plugin;
			$this->pluginbase .= '/' . $this->plugin;
		}

		// load plugin language
		JFactory::getLanguage()->load( 'plg_komento_' . $this->plugin, JPATH_ROOT );

		// load plugin params
		$this->params = KT::getRegistry( JPluginHelper::getPlugin( 'komento', $this->plugin )->params );
	}

	public function fetch( $file )
	{
		$path = $this->pluginpath . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . $this->plugin . DIRECTORY_SEPARATOR . $file;

		if( isset( $this->vars ) )
		{
			extract($this->vars);
		}

		ob_start();
		include( $path );

		$html = ob_get_contents();
		ob_end_clean();

		return $html;
	}

	public function set( $key, $value )
	{
		$this->vars[$key] = $value;
	}
}
