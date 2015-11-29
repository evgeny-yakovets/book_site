<?php
/* @var $this CommentController */
/* @var $model Comment */

if(!Yii::app()->user->isGuest && !Yii::app()->user->isAdmin())
{
	$this->breadcrumbs = array(
		$model->id,
	);
}
elseif (!Yii::app()->user->isGuest && Yii::app()->user->isAdmin())
{
	$this->breadcrumbs=array(
		'Comments'=>array('index'),
		$model->id,
	);
}
$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>Create Comment</h1>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'comment-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
