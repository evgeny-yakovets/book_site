<?php
/* @var $this RubricsBooksController */
/* @var $model RubricsBooks */

$this->breadcrumbs=array(
	'Rubrics Books'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RubricsBooks', 'url'=>array('index')),
	array('label'=>'Manage RubricsBooks', 'url'=>array('admin')),
);
?>

<h1>Create RubricsBooks</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>