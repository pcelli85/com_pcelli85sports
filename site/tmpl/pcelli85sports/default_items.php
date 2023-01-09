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
use Joomla\CMS\Router\Route;
use pcelli85\Component\pcelli85sports\Site\Helper\RouteHelper as pcelli85sportsHelperRoute;

?>
<div class="table-responsive">
  <table class="table table-striped">
  <caption><?php echo Text::_('COM_PCELLI85SPORTS_LIST_TABLE_CAPTION'); ?></caption>
  <thead>
    <tr>
 		<th scope="col"><?php echo Text::_('COM_PCELLI85SPORTS_LIST_TITLE'); ?></th>
		<th scope="col"><?php echo Text::_('COM_PCELLI85SPORTS_LIST_DATE_EVENT'); ?></th>
		<th scope="col"><?php echo Text::_('COM_PCELLI85SPORTS_LIST_LOCATION_EVENT'); ?></th>
		<th scope="col"><?php echo Text::_('COM_PCELLI85SPORTS_LIST_TEAM1_EVENT'); ?></th>
		<th scope="col"><?php echo Text::_('COM_PCELLI85SPORTS_LIST_TEAM2_EVENT'); ?></th>
		<th scope="col"><?php echo Text::_('COM_PCELLI85SPORTS_LIST_CATEGORIA'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($this->items as $id => $item) :
		$slug = preg_replace('/[^a-z\d]/i', '-', $item->title);
		$slug = strtolower(str_replace(' ', '-', $slug));
	?>
	<tr>
	    <?php if ($item->state == 1) : ?>
    		<td><a href="<?php echo Route::_(pcelli85sportsHelperRoute::getWalkRoute($item->id, $slug)); ?>">
    		<?php echo $item->title; ?></a></td>
        	<td><?php $date = new JDate($item->date_event); ?>
    			<?php
    			$mesi = array(1=>'gennaio', 'febbraio', 'marzo', 'aprile',
    			        'maggio', 'giugno', 'luglio', 'agosto',
    					'settembre', 'ottobre', 'novembre','dicembre');

    			$giorni = array('domenica','lunedì','martedì','mercoledì',
                        'giovedì','venerdì','sabato');

                list($sett,$giorno,$mese,$anno) = explode('-',date_format($date,"w-d-n-Y"));

    			echo $giorni[$sett],' ',$giorno,' ',$mesi[$mese],' ',$anno, ' ore ', date_format($date,"H:i");
            ?></td>
    		<td><?php echo $item->location_event; ?></td>
    		<td><?php echo $item->team1_event //$item->lastvisit; ?></td>
    		<td><?php echo $item->team2_event; ?></td>
		<?php endif; ?>
	</tr>
	<?php endforeach; ?><?php //endif; ?>
	</tbody>
  </table>
</div>
