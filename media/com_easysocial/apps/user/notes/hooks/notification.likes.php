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

class SocialUserAppNotesHookNotificationLikes extends SocialAppHooks
{
	public function execute($item, $note)
	{
		// If the skipExcludeUser is true, we don't unset myself from the list
		$excludeCurrentViewer = (isset($item->skipExcludeUser) && $item->skipExcludeUser) ? false : true;

		$users = $this->getReactionUsers($item->uid, $item->context_type, $item->actor_id, $excludeCurrentViewer);
		$names = $this->getNames($users);

		// Assign first users from likers for avatar
		$item->userOverride = ES::user($users[0]);

		// Set the title of the note
		$item->content = $note->title;

		$owner = ES::user($note->user_id);

		// We need to generate the notification message differently for the author of the item and the recipients of the item.
		if ($owner->id == $item->target_id && $item->target_type == SOCIAL_TYPE_USER) {
			$item->title = JText::sprintf($this->getPlurality('APP_USER_NOTES_USER_LIKES_YOUR_NOTE', $users), $names);

			return $item;
		}

		if ($owner->id == $item->actor_id && count($users) == 1) {
			$item->title = JText::sprintf($this->getGenderForLanguage('APP_USER_NOTES_OWNER_LIKES_NOTE', $owner->id), $names);

			return $item;
		}

		// This is for 3rd party viewers
		$item->title = JText::sprintf($this->getPlurality('APP_USER_NOTES_USER_LIKES_USERS_NOTE', $users), $names , $owner->getName());

		return $item;
	}

}
