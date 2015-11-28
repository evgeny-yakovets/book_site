<?php
/* @var $this CommentsSeriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comments Series',
);

$this->menu=array(
	array('label'=>'Create CommentsSeries', 'url'=>array('create')),
	array('label'=>'Manage CommentsSeries', 'url'=>array('admin')),
);
?>

<h1>Comments Series</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
