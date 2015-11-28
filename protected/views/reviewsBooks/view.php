<?php
/* @var $this ReviewsBooksController */
/* @var $model ReviewsBooks */

$this->breadcrumbs=array(
	'Reviews Books'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReviewsBooks', 'url'=>array('index')),
	array('label'=>'Create ReviewsBooks', 'url'=>array('create')),
	array('label'=>'Update ReviewsBooks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReviewsBooks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReviewsBooks', 'url'=>array('admin')),
);
?>

<h1>View ReviewsBooks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'review_id',
		'book_id',
	),
)); ?>
