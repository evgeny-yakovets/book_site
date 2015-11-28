<?php
/* @var $this CommentsSeriesController */
/* @var $model CommentsSeries */

$this->breadcrumbs=array(
	'Comments Series'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CommentsSeries', 'url'=>array('index')),
	array('label'=>'Manage CommentsSeries', 'url'=>array('admin')),
);
?>

<h1>Create CommentsSeries</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>