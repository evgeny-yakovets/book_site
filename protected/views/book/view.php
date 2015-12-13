<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->title,
);
if(!$isFavorite)
{
	$favorite = array('label'=>'Add to favorite', 'url'=>array($model->id,'aBookId'=>$model->id), 'visible'=>!Yii::app()->user->isGuest);
}
else
{
	$favorite = array('label'=>'Delete from favorites', 'url'=>array($model->id,'dBookId'=>$model->id), 'visible'=>!Yii::app()->user->isGuest);
}

$this->menu=array(
	array('label'=>'List Book', 'url'=>array('index'), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Create Book', 'url'=>array('create'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Update Book', 'url'=>array('update', 'id'=>$model->id), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Delete Book', 'url'=>'#', 'visible'=>Yii::app()->user->isAdmin(), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Book', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Add comment', 'url'=>array('/comment/create','bookId'=>$model->id), 'visible'=>!Yii::app()->user->isGuest),
	$favorite,
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

	<div class="view">
		<b><?php echo CHtml::encode('Files:')."<br>"; ?></b>
		<?php
			if(isset($model->files))
			{
				foreach($model->files as $file)
				{
					echo "<a href=http://localhost/upload/".$file->title.">".$file->type."</a><br>";
				}
			}
		?>
	</div>
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