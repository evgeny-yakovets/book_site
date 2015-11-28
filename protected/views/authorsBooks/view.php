<?php
/* @var $this AuthorsBooksController */
/* @var $model AuthorsBooks */

$this->breadcrumbs=array(
	'Authors Books'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AuthorsBooks', 'url'=>array('index')),
	array('label'=>'Create AuthorsBooks', 'url'=>array('create')),
	array('label'=>'Update AuthorsBooks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AuthorsBooks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AuthorsBooks', 'url'=>array('admin')),
);
?>

<h1>View AuthorsBooks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'book_id',
		'author_id',
	),
)); ?>
