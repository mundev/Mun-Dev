<?php
/**
* @package		EasySocial
* @copyright	Copyright (C) 2010 - 2017 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* EasySocial is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');

ES::import('fields:/user/textarea/textarea');

class SocialFieldsPageType extends SocialFieldItem
{
	/**
	 * Displays the field input for user when they register their account.
	 *
	 * @since	2.0
	 * @access	public
	 */
	public function onRegister(&$post)
	{
		$value = isset($post['page_type']) ? $post['page_type'] : $this->params->get('default');

		$this->set('value', $value);

		return $this->display();
	}

	/**
	 * Displays the field input for user when they register their account.
	 *
	 * @since	2.0
	 * @access	public
	 */
	public function onEdit(&$post , &$page)
	{
		$value = 1;

		if (isset($page) && $page->isOpen()) {
			$value = 1;
		}
		if (isset($page) && $page->isClosed()) {
			$value = 2;
		}
		if (isset($page) && $page->isInviteOnly()) {
			$value = 3;
		}

		$this->set('value', $value);
		return $this->display();
	}

	/**
	 * Executes before the page is created
	 *
	 * @since	2.0
	 * @access	public
	 */
	public function onEditBeforeSave(&$data , &$page)
	{
		$type = isset($data['page_type']) ? $data['page_type'] : 1;

		$changed = $page->type != $type;

		if ($changed) {
			$data['page_type_changed'] = true;
		}

		// Set the title on the page
		$page->type = $type;
	}

	public function onEditAfterSave(&$data, &$page)
	{
		if (empty($data['page_type_changed'])) {
			return true;
		}

		// Need to manually change:
		// 1. page events type
		// 2. Stream item privacy, including page events - cluster_access

		// Put on hold for this first
		$db = FD::db();
		$sql = $db->sql();

		// First get all the page events first
		$sql->select('#__social_clusters', 'a');
		$sql->column('a.id');
		$sql->leftjoin('#__social_events_meta', 'b');
		$sql->on('b.cluster_id', 'a.id');
		$sql->where('b.page_id', $page->id);

		$db->setQuery($sql);
		$clusterids = $db->loadColumn();

		if (!empty($clusterids)) {
			$sql->clear();
			$sql->update('#__social_clusters');
			$sql->set('type', $page->type);
			$sql->where('id', $clusterids, 'IN');

			$db->setQuery($sql);
			$db->query();

			// Merge in the page id
			$clusterids[] = $page->id;

			$sql->clear();
			$sql->update('#__social_stream');
			$sql->set('cluster_access', $page->type);
			$sql->where('cluster_id', $clusterids, 'IN');

			$db->setQuery($sql);
			$db->query();
		}

		unset($data['page_type_changed']);
	}

	/**
	 * Executes before the page is created
	 *
	 * @since	2.0
	 * @access	public
	 */
	public function onRegisterBeforeSave(&$data , &$page)
	{
		$type = isset($data['page_type']) ? $data['page_type'] : $this->params->get('default');

		// Set the title on the page
		$page->type = $type;
	}

	/**
	 * Perform necessary fixes to the page type if it isn't visible on the page
	 *
	 * @since	2.1.0
	 * @access	public
	 */
	public function onCustomPageBeforeSave(&$data, &$page)
	{
		// This field is already visible on the creation form, we shouldn't fiddle with the value
		if ($this->params->get('visible_registration')) {
			return;
		}

		$type = isset($data['page_type']) ? $data['page_type'] : $this->params->get('default');
		$page->type = $type;
	}
}
