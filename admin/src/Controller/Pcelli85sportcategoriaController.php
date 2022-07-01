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
class Pcelli85sportcategoriaController extends FormController
{

  public function save($key = null, $urlVar = null) {
      $return = parent::save($key, $urlVar);
      $this->setRedirect('index.php?option=com_pcelli85sports&view=Pcelli85sportscategorie');
      return $return;
  }

  public function cancel($key = null, $urlVar = null) {
      $return = parent::cancel($key, $urlVar);
      $this->setRedirect('index.php?option=com_pcelli85sports&view=Pcelli85sportscategorie');
      return $return;
  }

}
