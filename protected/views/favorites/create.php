<?php
/* @var $this FavoritesController */
/* @var $model Favorites */

$this->breadcrumbs=array(
	'Favorites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Favorites', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Favorites', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Create Favorites</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>