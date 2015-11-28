<?php
/* @var $this CommentsBooksController */
/* @var $data CommentsBooks */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('commnet_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->commnet_id), array('view', 'id'=>$data->commnet_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book_id')); ?>:</b>
	<?php echo CHtml::encode($data->book_id); ?>
	<br />


</div>