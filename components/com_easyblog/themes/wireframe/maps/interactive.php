<?php
/**
* @package      EasyBlog
* @copyright    Copyright (C) 2010 - 2016 Stack Ideas Sdn Bhd. All rights reserved.
* @license      GNU/GPL, see LICENSE.php
* EasyBlog is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<iframe width="100%" height="<?php echo $this->config->get('main_locations_blog_map_height');?>" frameborder="0" style="border:0"
src="<?php echo $mapUrl; ?>" allowfullscreen></iframe>