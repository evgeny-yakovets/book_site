<?php
/* @var $this AuthorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Authors',
);

$this->menu=array(
	array('label'=>'Create Author', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Manage Author', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Authors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
