<?php
/**
 * @package     pcelli85sports.Administrator
 * @subpackage  com_pcelli85sports
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace pcelli85\Component\pcelli85sports\Administrator\Table;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

/**
 * pcelli85sports table
 *
 * @since  1.5
 */
class pcelli85sportsTable extends Table
{
	/**
	 * Constructor
	 *
	 * @param   DatabaseDriver  $db  Database connector object
	 *
	 * @since   1.0
	 */
	public function __construct(DatabaseDriver $db)
	{
		parent::__construct('#__pcelli85sports', 'id', $db);
	}
}
