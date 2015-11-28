<?php
/* @var $this CommentsBooksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comments Books',
);

$this->menu=array(
	array('label'=>'Create CommentsBooks', 'url'=>array('create')),
	array('label'=>'Manage CommentsBooks', 'url'=>array('admin')),
);
?>

<h1>Comments Books</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
