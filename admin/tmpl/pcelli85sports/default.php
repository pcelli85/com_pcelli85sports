<?php
/**
 * @package     pcelli85sports.Administrator
 * @subpackage  com_pcelli85sports
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Router\Route;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
$states = array (
		'0' => Text::_('JUNPUBLISHED'),
		'1' => Text::_('JPUBLISHED'),
		'2' => Text::_('JARCHIVED'),
		'-2' => Text::_('JTRASHED')
);
$editIcon = '<span class="fa fa-pen-square me-2" aria-hidden="true"></span>';
?>
<form action="<?php echo Route::_('index.php?option=com_pcelli85sports'); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row">
		<div class="col-md-12">
			<div id="j-main-container" class="j-main-container">
				<?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
				<?php if (empty($this->items)) : ?>
					<div class="alert alert-info">
						<span class="fa fa-info-circle" aria-hidden="true"></span><span class="sr-only"><?php echo Text::_('INFO'); ?></span>
						<?php echo Text::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
					</div>
				<?php else : ?>
					<table class="table table-responsive" id="pcelli85sportsList">
						<caption id="captionTable">
							<?php echo Text::_('COM_PCELLI85SPORTS_MYWALKS_TABLE_CAPTION'); ?>, <?php echo Text::_('JGLOBAL_SORTED_BY'); ?>
						</caption>
						<thead>
							<tr>
								<td style="width:1%" class="text-center">
									<?php echo HTMLHelper::_('grid.checkall'); ?>
								</td>
								<th scope="col" style="width:1%; min-width:85px" class="text-center">
									<?php echo HTMLHelper::_('searchtools.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
								</th>
								<th scope="col" style="width:20%">
									<?php echo HTMLHelper::_('searchtools.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder); ?>
								</th>
								<th scope="col" style="width:20%">
									<?php echo HTMLHelper::_('searchtools.sort', 'COM_PCELLI85SPORTS_MYWALKS_LABEL_DATE_EVENT', 'a.date_event', $listDirn, $listOrder); ?>
								</th>
								<th scope="col" style="width:10%">
									<?php echo HTMLHelper::_('searchtools.sort', 'COM_PCELLI85SPORTS_MYWALKS_LABEL_LOCATION_EVENT', 'a.location_event', $listDirn, $listOrder); ?>
								</th>
								<th scope="col" style="width:10%">
									<?php echo HTMLHelper::_('searchtools.sort', 'COM_PCELLI85SPORTS_MYWALKS_LABEL_TEAM1_EVENT', 'a.team1_event', $listDirn, $listOrder); ?>
								</th>
								<th scope="col" style="width:5%" class="d-none d-md-table-cell">
									<?php echo HTMLHelper::_('searchtools.sort', 'COM_PCELLI85SPORTS_MYWALKS_LABEL_TEAM2_EVENT', 'a.team2_event', $listDirn, $listOrder); ?>
								</th>
								<th scope="col" style="width:5%" class="d-none d-md-table-cell">
									<?php echo HTMLHelper::_('searchtools.sort', 'Categoria', 'a.categoria', $listDirn, $listOrder); ?>
								</th>
								<th scope="col" style="width:5%" class="d-none d-md-table-cell">
									<?php echo HTMLHelper::_('searchtools.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
								</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$n = count($this->items);
						foreach ($this->items as $i => $item) :
							?>
							<tr class="row<?php echo $i % 2; ?>">
								<td class="text-center">
									<?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
								</td>
								<td class="class="article-status"">
									<?php echo $states[$item->state]; ?>
								</td>
								<th scope="row" class="has-context">
									<a class="hasTooltip" href="<?php echo Route::_('index.php?option=com_pcelli85sports&task=pcelli85sport.edit&id=' . $item->id); ?>">
										<?php echo $editIcon; ?><?php echo $this->escape($item->title); ?>
									</a>
								</th>
								<td class="">
									<?php $date = new JDate($item->date_event); ?>
									<?php
									$mesi = array(1=>'gennaio', 'febbraio', 'marzo', 'aprile',
																 'maggio', 'giugno', 'luglio', 'agosto',
																 'settembre', 'ottobre', 'novembre','dicembre');

									$giorni = array('domenica','lunedì','martedì','mercoledì',
																 'giovedì','venerdì','sabato');

									list($sett,$giorno,$mese,$anno) = explode('-',date_format($date,"w-d-n-Y"));

									echo $giorni[$sett],' ',$giorno,' ',$mesi[$mese],' ',$anno;
									?>
								</td>
								<td class="">
									<?php echo $item->location_event; ?>
								</td>
								<td class="">
									<?php echo $item->team1_event; ?>
								</td>
								<td class="">
									<?php echo $item->team2_event; ?>
								</td>
								<td class="">
									<?php echo $item->categoria; ?>
								</td>
								<td class="d-none d-md-table-cell">
									<?php echo $item->id; ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<?php // load the pagination. ?>
					<?php echo $this->pagination->getListFooter(); ?>

				<?php endif; ?>
				<input type="hidden" name="task" value="">
				<input type="hidden" name="boxchecked" value="0">
				<?php echo HTMLHelper::_('form.token'); ?>
			</div>
		</div>
	</div>
</form>
