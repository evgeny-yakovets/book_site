<?php
/* @var $this SeriesController */
/* @var $model Series */

$this->breadcrumbs=array(
	'Series'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Series', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Series', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Update Series', 'url'=>array('update', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Delete Series', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Manage Series', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>View Series #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'start_year',
		'end_year',
		'book_count',
		'description',
	),
)); ?>
