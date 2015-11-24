<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Book', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Book', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'View Book', 'url'=>array('view', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Book', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Update Book <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>