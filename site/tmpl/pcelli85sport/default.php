<?php
/**
 * @package     pcelli85sports.Site
 * @subpackage  com_pcelli85sports
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

?>
<div class="page-header">
	<h1><?php echo $this->item->title; ?></h1>
</div>

<h2><?php echo Text::_('COM_PCELLI85SPORTS_WALK_REPORTS'); ?></h2>

<div class="table-responsive">
  <table class="table table-striped">
  <caption><?php echo Text::_('COM_PCELLI85SPORTS_WALK_REPORTS'); ?></caption>
  <thead>
    <tr>
 		<th scope="col"><?php echo Text::_('COM_PCELLI85SPORTS_WALK_DATE'); ?></th>
		<th scope="col"><?php echo Text::_('Squadra casa'); ?></th>
		<th scope="col"><?php echo Text::_('Punti'); ?></th>
		<th scope="col"><?php echo Text::_('Punti'); ?></th>
		<th scope="col"><?php echo Text::_('Squadra Ospite'); ?></th>
		<th scope="col"><?php echo Text::_('COM_PCELLI85SPORTS_WALK_WEATHER'); ?></th>
		
	</tr>
	</thead>
	<tbody>
	<?php foreach ($this->reports as $id => $report) : ?>
	<tr>
		<td><?php echo $report->date; ?></td>
		<td><?php echo $report->team1_event; ?></td>
		<td><?php echo $report->result_team1; ?></td>
		<td><?php echo $report->result_team2; ?></td>
		<td><?php echo $report->team2_event; ?></td>
		<td><?php echo $report->weather; ?></td>
	</tr>
	<?php endforeach; ?><?php //endif; ?>
	</tbody>
  </table>
</div>
