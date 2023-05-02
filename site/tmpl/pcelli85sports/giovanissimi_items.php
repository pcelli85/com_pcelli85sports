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
  <table class="table-sport">
  <caption><?php echo Text::_('COM_PCELLI85SPORTS_LIST_TABLE_CAPTION'); ?></caption>
  <thead>
    <tr>
 		<th scope="col"><?php echo Text::_('Evento'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($this->items as $id => $item) :
		$slug = preg_replace('/[^a-z\d]/i', '-', $item->title);
		$slug = strtolower(str_replace(' ', '-', $slug));
		$today = date("Y-m-d H:i:s");
		//$dateToday = $today - (3600*24);
		$date = new JDate($item->date_event);
		$color_td = '#ffffffff';

        switch ($item->categoria_id) {
             case 5: // Note the lowercase chars
                 $color_td = "#00ffcc";
                 break;
             case 6: // Note the lowercase chars
                 $color_td = "#ccffcc";
                 break;
             case 7:
                 $color_td = "#ff9999";
                 break;
             default:
                 $color_td = '#ffffffff';
        }
		

	?>
	<tr>
    	    <?php if ($item->state == 1 && $date >= $today && $item->categoria_id == 4) : ?>
        		<td bgcolor="<?php echo $color_td;?>"><a href="<?php echo Route::_(pcelli85sportsHelperRoute::getWalkRoute($item->id, $slug)); ?>">
        		<?php echo $item->title; ?></a></td>
            	<td bgcolor="<?php echo $color_td;?>"><?php $date ?>
        			<?php
        			$mesi = array(1=>'Gen', 'Feb', 'Mar', 'Apr',
        			        'Mag', 'Giu', 'Lug', 'Ago',
        					'Set', 'Ott', 'Nov','Dic');
    
        			$giorni = array('Dom','Lun','Mar','Mer',
                            'Gio','Ven','Sab');
    
                    list($sett,$giorno,$mese,$anno) = explode('-',date_format($date,"w-d-n-Y"));
    
        			echo $giorni[$sett],' ',$giorno,' ',$mesi[$mese],' ',$anno, ' ore ', date_format($date,"H:i");
                ?></td>
        		<td bgcolor="<?php echo $color_td;?>"><?php echo $item->location_event; ?></td>
        		<td bgcolor="<?php echo $color_td;?>"><?php echo $item->team1_event //$item->lastvisit; ?></td>
        		<td bgcolor="<?php echo $color_td;?>"><?php echo $item->team2_event; ?></td>
        		<td bgcolor="<?php echo $color_td;?>"><?php echo $item->categoria; ?></td>
    		<?php endif; ?>
	</tr>
	<?php endforeach; ?><?php //endif; ?>
	</tbody>
  </table>
</div>
