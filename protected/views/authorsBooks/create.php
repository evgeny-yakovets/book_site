<?php
/* @var $this AuthorsBooksController */
/* @var $model AuthorsBooks */

$this->breadcrumbs=array(
	'Authors Books'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuthorsBooks', 'url'=>array('index')),
	array('label'=>'Manage AuthorsBooks', 'url'=>array('admin')),
);
?>

<h1>Create AuthorsBooks</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>