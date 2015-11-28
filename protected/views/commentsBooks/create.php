<?php
/* @var $this CommentsBooksController */
/* @var $model CommentsBooks */

$this->breadcrumbs=array(
	'Comments Books'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CommentsBooks', 'url'=>array('index')),
	array('label'=>'Manage CommentsBooks', 'url'=>array('admin')),
);
?>

<h1>Create CommentsBooks</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>