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

require_once(__DIR__ . '/abstract.php');

class JFormFieldEasySocial_PageCategory extends JFormFieldEasySocial
{
	protected $type = 'EasySocial_PageCategory';

	protected function getInput()
	{
		$this->page->start();

		$label = (string) $this->element['label'];
		$name = (string) $this->name;

		if($this->value)
		{
			$category = ES::table('PageCategory');
			$category->load($this->value);

			$label = $category->get('title');
		}

		$theme = ES::themes();
		$theme->set('name', $name);
		$theme->set('id', $this->id);
		$theme->set('value', $this->value);
		$theme->set('label', $label);

		$output = $theme->output('admin/jfields/pagecategory');

		$this->page->end();

		return $output;
	}
}
