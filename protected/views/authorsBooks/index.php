<?php
/* @var $this AuthorsBooksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Authors Books',
);

$this->menu=array(
	array('label'=>'Create AuthorsBooks', 'url'=>array('create')),
	array('label'=>'Manage AuthorsBooks', 'url'=>array('admin')),
);
?>

<h1>Authors Books</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
