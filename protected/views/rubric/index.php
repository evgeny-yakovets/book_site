<?php
/* @var $this RubricController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rubrics',
);

$this->menu=array(
	array('label'=>'Create Rubric', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Manage Rubric', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Rubrics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
