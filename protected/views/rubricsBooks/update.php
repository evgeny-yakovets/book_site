<?php
/* @var $this RubricsBooksController */
/* @var $model RubricsBooks */

$this->breadcrumbs=array(
	'Rubrics Books'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RubricsBooks', 'url'=>array('index')),
	array('label'=>'Create RubricsBooks', 'url'=>array('create')),
	array('label'=>'View RubricsBooks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RubricsBooks', 'url'=>array('admin')),
);
?>

<h1>Update RubricsBooks <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>