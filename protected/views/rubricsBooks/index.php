<?php
/* @var $this RubricsBooksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rubrics Books',
);

$this->menu=array(
	array('label'=>'Create RubricsBooks', 'url'=>array('create')),
	array('label'=>'Manage RubricsBooks', 'url'=>array('admin')),
);
?>

<h1>Rubrics Books</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
