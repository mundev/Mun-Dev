<?php
/**
* @package      EasySocial
* @copyright    Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

ES::import('fields:/user/textbox/textbox');

class SocialFieldsGroupTitle extends SocialFieldsUserTextbox
{
	/**
	 * Executes before the group is created.
	 *
	 * @since   1.2
	 * @access  public
	 */
	public function onRegisterBeforeSave(&$data, &$cluster)
	{
		$title = !empty($data[$this->inputName]) ? $data[$this->inputName] : '';

		// Set the title on the group
		$model = ES::model('Clusters');
		$cluster->title = $model->getUniqueTitle($title, SOCIAL_TYPE_GROUP);

		unset($data[$this->inputName]);
	}

	/**
	 * Executes before the group is save.
	 *
	 * @since   1.2
	 * @access  public
	 */
	public function onEditBeforeSave(&$data, &$cluster)
	{
		$title = !empty($data[$this->inputName]) ? $data[$this->inputName] : '';

		// Set the title on the group
		$model = ES::model('Clusters');
		$cluster->title = $model->getUniqueTitle($title, SOCIAL_TYPE_GROUP, $cluster->id);

		unset($data[$this->inputName]);
	}

	/**
	 * Executes before the group is save.
	 *
	 * @since   1.2
	 * @access  public
	 */
	public function onAdminEditBeforeSave(&$data, &$cluster)
	{
		$title = !empty($data[$this->inputName]) ? $data[$this->inputName] : '';

		// Set the title on the group
		$model = ES::model('Clusters');
		$cluster->title = $model->getUniqueTitle($title, SOCIAL_TYPE_GROUP, $cluster->id);

		unset($data[$this->inputName]);
	}

	/**
	 * Displays the group title textbox.
	 *
	 * @since   1.2
	 * @access  public
	 */
	public function onEdit(&$post, &$cluster, $errors)
	{
		// The value will always be the group title
		$value = !empty($post[$this->inputName]) ? $post[$this->inputName] : $cluster->getName();

		// Get the error.
		$error = $this->getError($errors);

		// Set the value.
		$this->set('value', $this->escape($value));
		$this->set('error', $error);

		return $this->display();
	}

	/**
	 * Displays the group description textbox.
	 *
	 * @since   1.2
	 * @access  public
	 */
	public function onAdminEdit(&$post, &$cluster, $errors)
	{
		// The value will always be the group title
		$value = !empty($post[$this->inputName]) ? $post[$this->inputName] : $cluster->getName();

		// Get the error.
		$error = $this->getError($errors);

		// Set the value.
		$this->set('value', $this->escape($value));
		$this->set('error', $error);

		return $this->display();
	}

	/**
	 * Responsible to output the html codes that is displayed to a user.
	 *
	 * @since   1.2
	 * @access  public
	 */
	public function onDisplay($cluster)
	{
		$this->value = $cluster->getName();

		return parent::onDisplay($cluster);
	}
}