<?php
/* @var $this FavoritesController */
/* @var $model Favorites */

$this->breadcrumbs=array(
	'Favorites'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Favorites', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Favorites', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'View Favorites', 'url'=>array('view', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Favorites', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Update Favorites <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>