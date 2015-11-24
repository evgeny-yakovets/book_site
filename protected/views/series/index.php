<?php
/* @var $this SeriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Series',
);

$this->menu=array(
	array('label'=>'Create Series', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Manage Series', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Series</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
