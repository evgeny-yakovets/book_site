<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
$userUrl = '';
if(!Yii::app()->user->isGuest)
{
	$userUrl = Yii::app()->user->userId;
}
$this->menu=array(
	array('label'=>'User', 'url'=>array('/user/'.$userUrl), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Author', 'url'=>array('/author/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'AuthorsBooks', 'url'=>array('/authorsBooks/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Books', 'url'=>array('/book/index')),
	array('label'=>'Comments', 'url'=>array('/comment/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'CommentsBooks', 'url'=>array('/commentsBooks/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'CommentsSeries', 'url'=>array('/commentsSeries/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Favorites', 'url'=>array('/book/index','favoriteBooks'=>true)),
	array('label'=>'Files', 'url'=>array('/files/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Review', 'url'=>array('/review/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'ReviewsBooks', 'url'=>array('/reviewsBooks/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Rubric', 'url'=>array('/rubric/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'RubricsBooks', 'url'=>array('/rubricsBooks/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Series', 'url'=>array('/series/index')),
	array('label'=>'SeriesBooksAuthors', 'url'=>array('/seriesBooksAuthors/index'), 'visible'=>Yii::app()->user->isAdmin()),

);

?>


<div class="span-5 last">
	<div id="sidebar">
		<?php
		$title = 'Menu';
		if(Yii::app()->user->isAdmin())
		{
			$title = 'Administration menu';
		}
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>$title,
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		?>
	</div><!-- sidebar -->
</div>

