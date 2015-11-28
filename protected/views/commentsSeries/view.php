<?php
/* @var $this CommentsSeriesController */
/* @var $model CommentsSeries */

$this->breadcrumbs=array(
	'Comments Series'=>array('index'),
	$model->comment_id,
);

$this->menu=array(
	array('label'=>'List CommentsSeries', 'url'=>array('index')),
	array('label'=>'Create CommentsSeries', 'url'=>array('create')),
	array('label'=>'Update CommentsSeries', 'url'=>array('update', 'id'=>$model->comment_id)),
	array('label'=>'Delete CommentsSeries', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->comment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommentsSeries', 'url'=>array('admin')),
);
?>

<h1>View CommentsSeries #<?php echo $model->comment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'comment_id',
		'series_id',
	),
)); ?>
