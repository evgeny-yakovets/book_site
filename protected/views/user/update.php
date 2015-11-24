<?php
/* @var $this UserController */
/* @var $model User */

if(!Yii::app()->user->isGuest && !Yii::app()->user->isAdmin())
{
	$this->breadcrumbs = array(
		$model->id,
	);
}
if(!Yii::app()->user->isGuest && Yii::app()->user->isAdmin())
{
	$this->breadcrumbs = array(
		'Users' => array('index'),
		$model->id,
	);
}

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Create User', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Manage User', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
);
?>

<h1>Update User <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>