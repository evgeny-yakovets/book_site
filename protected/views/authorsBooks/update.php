<?php
/* @var $this AuthorsBooksController */
/* @var $model AuthorsBooks */

$this->breadcrumbs=array(
	'Authors Books'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AuthorsBooks', 'url'=>array('index')),
	array('label'=>'Create AuthorsBooks', 'url'=>array('create')),
	array('label'=>'View AuthorsBooks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AuthorsBooks', 'url'=>array('admin')),
);
?>

<h1>Update AuthorsBooks <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>