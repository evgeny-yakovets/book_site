<?php
/* @var $this SeriesBooksAuthorsController */
/* @var $model SeriesBooksAuthors */

$this->breadcrumbs=array(
	'Series Books Authors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SeriesBooksAuthors', 'url'=>array('index')),
	array('label'=>'Manage SeriesBooksAuthors', 'url'=>array('admin')),
);
?>

<h1>Create SeriesBooksAuthors</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>