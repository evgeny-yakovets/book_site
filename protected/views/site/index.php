<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php


$this->menu=array(
	array('label'=>'User', 'url'=>array('/user/'.Yii::app()->user->userId), 'visible'=>!Yii::app()->user->isGuest),
	array('label'=>'Author', 'url'=>array('/author/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Rubric', 'url'=>array('/rubric/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Books', 'url'=>array('/book/index')),
	array('label'=>'Series', 'url'=>array('/series/index')),
	array('label'=>'AuthorsBooks', 'url'=>array('/authorsBooks/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Review', 'url'=>array('/review/index'), 'visible'=>Yii::app()->user->isAdmin()),
	array('label'=>'Files', 'url'=>array('/files/index'), 'visible'=>Yii::app()->user->isAdmin()),
);

?>


<div class="span-5 last">
	<div id="sidebar">
		<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Administration menu',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		?>
	</div><!-- sidebar -->
</div>

