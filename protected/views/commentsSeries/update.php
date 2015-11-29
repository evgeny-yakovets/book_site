<?php
/* @var $this CommentsSeriesController */
/* @var $model CommentsSeries */

$this->breadcrumbs=array(
	'Comments Series'=>array('index'),
	$model->comment_id=>array('view','id'=>$model->comment_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommentsSeries', 'url'=>array('index')),
	array('label'=>'Create CommentsSeries', 'url'=>array('create')),
	array('label'=>'View CommentsSeries', 'url'=>array('view', 'id'=>$model->comment_id)),
	array('label'=>'Manage CommentsSeries', 'url'=>array('admin')),
);
?>

<h1>Update CommentsSeries <?php echo $model->comment_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>