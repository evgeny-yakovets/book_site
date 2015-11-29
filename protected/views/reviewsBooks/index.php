<?php
/* @var $this ReviewsBooksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reviews Books',
);

$this->menu=array(
	array('label'=>'Create ReviewsBooks', 'url'=>array('create')),
	array('label'=>'Manage ReviewsBooks', 'url'=>array('admin')),
);
?>

<h1>Reviews Books</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
