<?php
/* @var $this RubricsBooksController */
/* @var $data RubricsBooks */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book_id')); ?>:</b>
	<?php echo CHtml::encode($data->book_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rubric_id')); ?>:</b>
	<?php echo CHtml::encode($data->rubric_id); ?>
	<br />


</div>