<?php
/* @var $this SeriesBooksAuthorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Series Books Authors',
);

$this->menu=array(
	array('label'=>'Create SeriesBooksAuthors', 'url'=>array('create')),
	array('label'=>'Manage SeriesBooksAuthors', 'url'=>array('admin')),
);
?>

<h1>Series Books Authors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
