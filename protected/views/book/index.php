<?php
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books',
);

$this->menu=array(
	array('label'=>'Create Book', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Manage Book', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Books</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
