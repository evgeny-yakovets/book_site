<?php
/* @var $this FavoritesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Favorites',
);

$this->menu=array(
	array('label'=>'Create Favorites', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Manage Favorites', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Favorites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
