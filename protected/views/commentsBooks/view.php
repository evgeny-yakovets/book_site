<?php
/* @var $this CommentsBooksController */
/* @var $model CommentsBooks */

$this->breadcrumbs=array(
	'Comments Books'=>array('index'),
	$model->commnet_id,
);

$this->menu=array(
	array('label'=>'List CommentsBooks', 'url'=>array('index')),
	array('label'=>'Create CommentsBooks', 'url'=>array('create')),
	array('label'=>'Update CommentsBooks', 'url'=>array('update', 'id'=>$model->commnet_id)),
	array('label'=>'Delete CommentsBooks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->commnet_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommentsBooks', 'url'=>array('admin')),
);
?>

<h1>View CommentsBooks #<?php echo $model->commnet_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'commnet_id',
		'book_id',
	),
)); ?>
