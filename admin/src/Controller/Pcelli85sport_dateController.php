<?php
/**
 * @package     pcelli85sports.Administrator
 * @subpackage  com_pcelli85sports
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace pcelli85\Component\pcelli85sports\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;

/**
 * Controller for a single pcelli85sport
 *
 * @since  1.6
 */
class pcelli85sport_dateController extends FormController
{
	public function cancel($key = null) {
		$this->setRedirect('index.php?option=com_pcelli85sports&view=pcelli85sport_dates');
	}
}
