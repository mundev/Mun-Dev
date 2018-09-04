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
defined('_JEXEC') or die('Restricted access');

/**
 * Editor KomentoDisable buton
 *
 * @package		Joomla.Plugin
 * @subpackage	Editors-xtd.KomentoDisable
 * @since 1.6
 */
class plgButtonKomentoDisable extends JPlugin
{
	/**
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 * @since       1.6
	 */
	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	/**
	 * KomentoDisable button
	 * @return array A two element array of (imageName, textToInsert)
	 */
	public function onDisplay($name)
	{
		$app = JFactory::getApplication();

		$doc = JFactory::getDocument();
		$template = $app->getTemplate();

		// button is not active in specific content components
		$getContent = $this->_subject->getContent($name);
		$present = JText::_('KomentoDisable is already added.', true) ;
		$js = "
			function insertKomentoDisable(editor) {
				var content = $getContent
				if (content.match(/\{KomentoDisable\}/)) {
					alert('$present');
					return false;
				} else {
					jInsertEditorText('{KomentoDisable}', editor);
				}
			}
			";

		$doc->addScriptDeclaration($js);

		$button = new JObject;
		$button->set('modal', false);
		$button->set('onclick', 'insertKomentoDisable(\''.$name.'\');return false;');
		$button->set('text', JText::_('Komento Disable'));
		$button->set('name', 'cancel-circle');
		// TODO: The button writer needs to take into account the javascript directive
		//$button->set('link', 'javascript:void(0)');
		$button->set('link', '#');

		return $button;
	}
}