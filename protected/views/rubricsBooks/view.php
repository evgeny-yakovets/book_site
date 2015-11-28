<?php
/* @var $this RubricsBooksController */
/* @var $model RubricsBooks */

$this->breadcrumbs=array(
	'Rubrics Books'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RubricsBooks', 'url'=>array('index')),
	array('label'=>'Create RubricsBooks', 'url'=>array('create')),
	array('label'=>'Update RubricsBooks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RubricsBooks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RubricsBooks', 'url'=>array('admin')),
);
?>

<h1>View RubricsBooks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'book_id',
		'rubric_id',
	),
)); ?>
