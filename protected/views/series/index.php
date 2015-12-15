<?php
/* @var $this SeriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Series',
);

$this->menu=array(
	array('label'=>'Create Series', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Manage Series', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
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

<h1>Series</h1>

<?php
echo CHtml::beginForm(CHtml::normalizeUrl(array('series/index')), 'get', array('id'=>'filter-form'));
echo CHtml::label( 'Title: ', false);
echo CHtml::textField('title', (isset($_GET['title'])) ? $_GET['title'] : '', array('id'=>'title'));
echo CHtml::submitButton('Search', array('name'=>''))."<br>";
echo CHtml::endForm();
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
		'title',
	),
	'id'=>'ajaxListView',
));
?>
