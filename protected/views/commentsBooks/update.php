<?php
/* @var $this CommentsBooksController */
/* @var $model CommentsBooks */

$this->breadcrumbs=array(
	'Comments Books'=>array('index'),
	$model->commnet_id=>array('view','id'=>$model->commnet_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommentsBooks', 'url'=>array('index')),
	array('label'=>'Create CommentsBooks', 'url'=>array('create')),
	array('label'=>'View CommentsBooks', 'url'=>array('view', 'id'=>$model->commnet_id)),
	array('label'=>'Manage CommentsBooks', 'url'=>array('admin')),
);
?>

<h1>Update CommentsBooks <?php echo $model->commnet_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>