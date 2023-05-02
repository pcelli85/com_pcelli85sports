<?php
/**
 * @package     pcelli85sports.Site
 * @subpackage  com_pcelli85sports
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
//use Joomla\CMS\Layout\LayoutHelper;

HTMLHelper::_('behavior.core');

?>
<h1><?php echo Text::_('MINI TAMBURELLO'); ?></h1>
<div class="com-contact-categories categories-list">
	<?php
		echo $this->loadTemplate('items');
	?>
</div>
