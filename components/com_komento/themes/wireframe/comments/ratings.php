<?php
/**
* @package		Komento
* @copyright	Copyright (C) 2010 - 2018 Stack Ideas Sdn Bhd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Komento is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
defined('_JEXEC') or die('Unauthorized Access');
?>
<div class="kt-ratings-stars" style="display: inline-block;" data-kt-ratings-item data-score="<?php echo $comment->ratings / 2;?>"></div>
<span class="kt-ratings-title"><b><?php echo $comment->ratings / 2;?></b> / <b>5</b></span>