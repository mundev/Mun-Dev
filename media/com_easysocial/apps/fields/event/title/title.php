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

class SocialFieldsEventTitle extends SocialFieldsUserTextbox
{
	/**
	 * Support for generic getFieldValue('TITLE')
	 *
	 * @since  1.3.9
	 * @access public
	 */
	public function getValue()
	{
		$container = $this->getValueContainer();

		if ($this->field->type == SOCIAL_TYPE_EVENT && !empty($this->field->uid)) {
			$event = FD::event($this->field->uid);

			$container->value = $event->getName();

			$container->data = $event->title;
		}

		return $container;
	}

	/**
	 * Displays the event title textbox.
	 *
	 * @since   1.3
	 * @access  public
	 */
	public function onEdit(&$post, &$cluster, $errors)
	{
		// The value will always be the event title
		$value = !empty($post[$this->inputName]) ? $post[$this->inputName] : $cluster->getName();

		// Get the error.
		$error = $this->getError($errors);

		// Set the value.
		$this->set('value', $this->escape($value));
		$this->set('error', $error);

		return $this->display();
	}

	/**
	 * Displays the event description textbox.
	 *
	 * @since   1.3
	 * @access  public
	 */
	public function onAdminEdit(&$post, &$cluster, $errors)
	{
		// The value will always be the event title
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
	 * @since   1.3
	 * @access  public
	 */
	public function onDisplay($cluster)
	{
		$this->value = $cluster->getName();

		return parent::onDisplay($cluster);
	}

	/**
	 * Executes before the event is created.
	 *
	 * @since   1.3
	 * @access  public
	 */
	public function onRegisterBeforeSave(&$post, &$cluster)
	{
		$title = !empty($post[$this->inputName]) ? $post[$this->inputName] : '';

		// Set the title on the event
		$model = ES::model('Clusters');

		if ($cluster->parent_id) {
			// we now this is a recurring event creation.
			// lets add a date into the title.
			if (isset($post['startDatetime']) && $post['startDatetime']) {

				$parentEvent = ES::event($cluster->parent_id);

				$startDate = ES::date($post['startDatetime']);
				$title = $parentEvent->title . ' - ' . $startDate->format(JText::_('d.m.Y'));
			}
		}

		$cluster->title = $model->getUniqueTitle($title, SOCIAL_TYPE_EVENT);

		unset($post[$this->inputName]);
	}

	/**
	 * Executes before the event is save.
	 *
	 * @since   1.3
	 * @access  public
	 */
	public function onEditBeforeSave(&$post, &$cluster)
	{
		$title = !empty($post[$this->inputName]) ? $post[$this->inputName] : '';

		// Set the title on the event
		$model = ES::model('Clusters');

		if ($cluster->parent_id) {

			$parent = ES::event($cluster->parent_id);

			$appendDate = $title == $parent->title ? true : false;

			// we now this is a recurring event creation.
			// lets add a date into the title.
			if (isset($post['startDatetime']) && $post['startDatetime'] && $appendDate) {
				$title .= ' - ' . $cluster->getEventStart()->format(JText::_('d.m.Y'));
			}
		}

		$cluster->title = $model->getUniqueTitle($title, SOCIAL_TYPE_EVENT, $cluster->id);

		unset($post[$this->inputName]);
	}

	/**
	 * Executes before the event is save.
	 *
	 * @since   1.3
	 * @access  public
	 */
	public function onAdminEditBeforeSave(&$post, &$cluster)
	{
		$title = !empty($post[$this->inputName]) ? $post[$this->inputName] : '';

		// Set the title on the event
		$model = ES::model('Clusters');
		$cluster->title = $model->getUniqueTitle($title, SOCIAL_TYPE_EVENT, $cluster->id);

		unset($post[$this->inputName]);
	}
}
