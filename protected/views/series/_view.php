<?php
/* @var $this SeriesController */
/* @var $data Series */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_year')); ?>:</b>
	<?php echo CHtml::encode($data->start_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_year')); ?>:</b>
	<?php echo CHtml::encode($data->end_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book_count')); ?>:</b>
	<?php echo CHtml::encode($data->book_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>