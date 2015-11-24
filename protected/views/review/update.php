<?php
/* @var $this ReviewController */
/* @var $model Review */

$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Review', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Review', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'View Review', 'url'=>array('view', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Review', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Update Review <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>