<?php
/* @var $this SeriesBooksAuthorsController */
/* @var $model SeriesBooksAuthors */

$this->breadcrumbs=array(
	'Series Books Authors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SeriesBooksAuthors', 'url'=>array('index')),
	array('label'=>'Create SeriesBooksAuthors', 'url'=>array('create')),
	array('label'=>'Update SeriesBooksAuthors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SeriesBooksAuthors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SeriesBooksAuthors', 'url'=>array('admin')),
);
?>

<h1>View SeriesBooksAuthors #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'series_id',
		'book_id',
		'author_id',
	),
)); ?>
