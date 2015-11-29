<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Book', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Book', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Update Book', 'url'=>array('update', 'id'=>$model->id), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Delete Book', 'url'=>'#', 'visible'=>Yii::app()->user->isAdmin(), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Book', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Add comment', 'url'=>array('/comment/create','bookId'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
);
?>

<h1><?php echo $model->title; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
		'year',
		'description',
		'text_preview',
	),
));?>
<?php

if(isset($model->rubric)) {
		$this->widget('zii.widgets.CDetailView', array(
			'data' => $model,
			'attributes' => array(
				'rubric',
			),
		));
}
?>
	<br>
	<h3> <?php echo 'Reviews:'; ?></h3>
<?php
if(isset($model->review))
{
	foreach($model->review as $review) {
		$this->widget('zii.widgets.CDetailView', array(
			'data' => $review->attributes,
			'attributes' => array(
				'title',
				'author',
				'date',
				'text',
				'review_link',
			),
		));
	}
}
//var_dump($model);
//$this->renderPartial('_form', array('model'=>$model));
?>

	<br>
	<h3> <?php echo 'Comments:'; ?></h3>

<?php

if(isset($model->comments))
{
	$i = 0;
	foreach($model->comments as $comment)
	{
		$i++;
		echo '<h6>Comment #'.$i.'</h6>';
		$this->widget('zii.widgets.CDetailView', array(
			'data' => $comment->attributes,
			'attributes' => array(
				'author',
				'date',
				'text',
			),
		));
	}

}?>