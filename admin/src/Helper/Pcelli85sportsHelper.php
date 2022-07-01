<?php
/**
 * @package     pcelli85sports.Administrator
 * @subpackage  com_pcelli85sports
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace pcelli85\Component\pcelli85sports\Administrator\Helper;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;

/**
 * pcelli85sports component helper.
 *
 * @since  4.0
 */
class pcelli85sportsHelper
{
	public static function getWalkTitle($id)
	{
		if (empty($id))
		{
			// throw an error or ...
			return false;
		}
		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title');
		$query->from('#__pcelli85sports');
		$query->where('id = ' . $id);
		$db->setQuery($query);
		return $db->loadObject();
	}
}