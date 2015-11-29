<?php
/* @var $this FilesController */
/* @var $model Files */

$this->breadcrumbs=array(
	'Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
	array('label'=>'Manage Files', 'url'=>array('admin')),
);
?>

<h1>Create Files</h1>

<?php //$this->renderPartial('_form', array('model'=>$model)); ?>



	<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>

	<?php echo CHtml::activeFileField($model, 'files'); ?>
<div class="row buttons">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>
	<?php echo CHtml::endForm(); ?>


