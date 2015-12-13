<?php
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Books',
);

$this->menu=array(
	array('label'=>'Create Book', 'url'=>array('create')),
	array('label'=>'Manage Book', 'url'=>array('admin')),
);
?>


<?php


Yii::app()->clientScript->registerScript('search',
	"var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#string').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'ajaxListView',
                {data: ajaxRequest}
            )
        },
// this is the delay
        300);
    });"
);
?>

<h1>Books</h1>


<?php
echo CHtml::beginForm(CHtml::normalizeUrl(array('book/index')), 'get', array('id'=>'filter-form'));
echo CHtml::label( 'Title: ', false);
echo CHtml::textField('title', (isset($_GET['title'])) ? $_GET['title'] : '', array('id'=>'title'));
echo CHtml::submitButton('Search', array('name'=>''))."<br>";
echo CHtml::label( 'Year: ', false);
echo CHtml::textField('year', (isset($_GET['year'])) ? $_GET['year'] : '', array('id'=>'year'));
echo CHtml::endForm();
?>




<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
		'title',
		'year',
	),
	'id'=>'ajaxListView',
));
?>



<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
