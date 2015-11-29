<?php
/* @var $this ReviewsBooksController */
/* @var $model ReviewsBooks */

$this->breadcrumbs=array(
	'Reviews Books'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReviewsBooks', 'url'=>array('index')),
	array('label'=>'Create ReviewsBooks', 'url'=>array('create')),
	array('label'=>'View ReviewsBooks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReviewsBooks', 'url'=>array('admin')),
);
?>

<h1>Update ReviewsBooks <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>