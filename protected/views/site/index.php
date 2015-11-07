<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
foreach ($authors as $author)
{
	echo "<p>" . $author->name . " " . $author->born . " " . $author->death . " " . $author->description . "<p>";
}?>


<form action="" method="post" name="delete">
	<label>Choose method (insert, delete, update):</label><br>
	<input type="text" name = "method"/><br>
	<label>Enter author's name:</label><br>
	<input type="text" name = "name"/><br>
	<label>Enter author's year of born:</label><br>
	<input type="text" name = "born"/><br>
	<label>Enter author's year of death:</label><br>
	<input type="text" name = "death"/><br>
	<label>Enter author's description:</label><br>
	<input type="text" name = "description"/><br>
	<input type="submit" />
</form>
