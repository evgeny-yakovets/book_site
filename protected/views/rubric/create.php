<?php
/* @var $this RubricController */
/* @var $model Rubric */

$this->breadcrumbs=array(
	'Rubrics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rubric', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage Rubric', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Create Rubric</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>