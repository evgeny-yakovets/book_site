<?php
/* @var $this ReviewsBooksController */
/* @var $model ReviewsBooks */

$this->breadcrumbs=array(
	'Reviews Books'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReviewsBooks', 'url'=>array('index')),
	array('label'=>'Manage ReviewsBooks', 'url'=>array('admin')),
);
?>

<h1>Create ReviewsBooks</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>