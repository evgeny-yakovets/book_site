<?php
/* @var $this AuthorController */
/* @var $data Author */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('born')); ?>:</b>
	<?php echo CHtml::encode($data->born); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('death')); ?>:</b>
	<?php echo CHtml::encode($data->death); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>