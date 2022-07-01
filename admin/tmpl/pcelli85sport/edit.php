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

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

?>

<form action="<?php echo Route::_('index.php?option=com_pcelli85sports&view=pcelli85sport&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" name="adminForm" id="pcelli85sports-form" class="form-validate">

	<?php echo LayoutHelper::render('joomla.edit.title_alias', $this); ?>

	<div>
		<?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'details')); ?>

		<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'details', Text::_('COM_PCELLI85SPORTS_MYWALK_TAB_DETAILS')); ?>
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<?php echo $this->form->renderField('date_event'); ?>
						<?php echo $this->form->renderField('location_event'); ?>
						<?php echo $this->form->renderField('team1_event'); ?>
						<?php echo $this->form->renderField('team2_event'); ?>
						<?php echo $this->form->renderField('categoria_id'); ?>
						<?php echo $this->form->renderField('id'); ?>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card card-light">
					<div class="card-body">
						<?php echo LayoutHelper::render('joomla.edit.global', $this); ?>
					</div>
				</div>
			</div>
		</div>
		<?php echo HTMLHelper::_('uitab.endTab'); ?>

		<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'options', Text::_('COM_PCELLI85SPORTS_MYWALK_TAB_OPTIONS')); ?>
		<div class="row">
			<div class="col-md-12">
				<!-- <?php echo $this->form->renderField('toilets'); ?>
				<?php echo $this->form->renderField('cafe'); ?>
				<?php echo $this->form->renderField('bogs'); ?> -->
			</div>
		</div>
		<?php echo HTMLHelper::_('uitab.endTab'); ?>

		<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'picture', Text::_('COM_PCELLI85SPORTS_MYWALK_TAB_PICTURE')); ?>
		<div class="row">
			<div class="col-md-12">
				<!-- <?php echo $this->form->renderField('picture'); ?>
				<?php echo $this->form->renderField('width'); ?>
				<?php echo $this->form->renderField('height'); ?>
				<?php echo $this->form->renderField('alt'); ?> -->
			</div>
		</div>
		<?php echo HTMLHelper::_('uitab.endTab'); ?>

		<?php echo HTMLHelper::_('uitab.endTabSet'); ?>
	</div>
	<input type="hidden" name="task" value="">
	<?php echo HTMLHelper::_('form.token'); ?>
</form>
