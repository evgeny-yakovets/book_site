<?php
/* @var $this SeriesBooksAuthorsController */
/* @var $model SeriesBooksAuthors */

$this->breadcrumbs=array(
	'Series Books Authors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SeriesBooksAuthors', 'url'=>array('index')),
	array('label'=>'Create SeriesBooksAuthors', 'url'=>array('create')),
	array('label'=>'View SeriesBooksAuthors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SeriesBooksAuthors', 'url'=>array('admin')),
);
?>

<h1>Update SeriesBooksAuthors <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>