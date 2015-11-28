<?php
/* @var $this CommentsBooksController */
/* @var $model CommentsBooks */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-books-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'commnet_id'); ?>
		<?php echo $form->textField($model,'commnet_id'); ?>
		<?php echo $form->error($model,'commnet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'book_id'); ?>
		<?php echo $form->textField($model,'book_id'); ?>
		<?php echo $form->error($model,'book_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->