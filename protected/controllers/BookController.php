<?php

class BookController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id, $aBookId = null, $dBookId = null)
	{
		$authorsNames = [];
		$authors = Author::model()->findAllBySql('
		SELECT a.*
		FROM db_author AS a
		INNER JOIN db_authors_books AS ab
		ON ab.author_id = a.id
		WHERE ab.book_id = '.$id
		);

		foreach($authors as $author)
		{
			$authorsNames[] = $author['name'];
		}

		if(!Yii::app()->user->isGuest)
		{
			if($aBookId)
			{
				$this->addFavorite($aBookId);
				$this->redirect($id,array(
					'model' => $this->loadModel($id),
					'isFavorite' => $this->isFavorite($id),
					'author' => $authorsNames,
				));
			}
			elseif($dBookId)
			{
				$this->deleteFavorite($dBookId);
				$this->redirect($id,array(
					'model' => $this->loadModel($id),
					'isFavorite' => $this->isFavorite($id),
					'author' => $authorsNames,
				));
			}
			else
				$this->render('view',array(
					'model' => $this->loadModel($id),
					'isFavorite' => $this->isFavorite($id),
					'author' => $authorsNames,
				));
		}
		else
			$this->render('view',array(
				'model' => $this->loadModel($id),
				'author' => $authorsNames,
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Book;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Comment']))
		{
			$commentModel = new Comment;
			$_POST['Comment']['author'] = Yii::app()->user->name;
			$commentModel->attributes=$_POST['Comment'];
			if($commentModel->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		if(isset($_POST['Book']))
		{
			$model->attributes=$_POST['Book'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function addFavorite($bookId = null)
	{
		$model=new Favorites;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if($bookId)
		{
			$attributes['user_id'] = Yii::app()->user->userId;
			$attributes['book_id'] = $bookId;

			$model->attributes=$attributes;
			$model->save();
		}
	}

	public function deleteFavorite($bookId = null)
	{
		$favorites = Favorites::model()->findAllBySql('
		SELECT f.*
		FROM db_favorites AS f
		WHERE f.user_id = '. Yii::app()->user->userId .'
		AND f.book_id = '. $bookId
		);
		if($favorites)
		{
			foreach($favorites as $favorite)
			{
				$favorite->delete();
			}

		}

	}

	public function isFavorite($bookId = null)
	{
		$favorites = Favorites::model()->findAllBySql('
		SELECT f.*
		FROM db_favorites AS f
		WHERE f.user_id = '. Yii::app()->user->userId .'
		AND f.book_id = '. $bookId
		);
		if($favorites)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Book']))
		{
			$model->attributes=$_POST['Book'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($favoriteBooks = null, $seriesId = null, $title = null, $year = null)
	{
		$params= array();


		if($favoriteBooks)
		{
			$books = Book::model()->findAllBySql('
				SELECT b.*
				FROM db_book AS b
				INNER JOIN db_favorites AS f
				ON f.book_id = b.id
				WHERE f.user_id = ' . Yii::app()->user->userId
			);

				foreach($books as $book)
				{
					$params[] = $book['id'];
				}
			if(!$params)
			{
				$params[] = -1;
			}

				$params = array(
					'criteria'=>array(
						'condition'=> 'id IN ('. implode ( ",", $params ).')'
					)
				);

		}

		if($seriesId)
		{
			$books = Book::model()->findAllBySql('
				SELECT b.*
				FROM db_book AS b
				INNER JOIN db_series_books_authors AS sba
				ON sba.book_id = b.id
				WHERE sba.series_id = ' . $seriesId
			);

			foreach($books as $book)
			{
				$params[] = $book['id'];
			}

			$params = array(
				'criteria'=>array('condition'=> 'id IN ('. implode ( ",", $params ).')')
			);
		}

		if($title || $year)
		{
			$criteria = new CDbCriteria();
			$criteria->addSearchCondition('title', $title, true, 'AND');
			$criteria->addSearchCondition('year', $year, true, 'AND');
			$params = array(
				'criteria'=>$criteria,
			);
		}

		$dataProvider=new CActiveDataProvider('Book', $params);

		$this->render('index',
			array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Book('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$model->attributes=$_GET['Book'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Book the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Book::model()->findByPk($id);

		$rubrics = Rubric::model()->findAllBySql('
		SELECT r.title
		FROM db_rubric AS r
		INNER JOIN db_rubrics_books AS rb
		ON rb.rubric_id = r.id
		WHERE rb.book_id = '.$id
		);
		$string = '';
		foreach ($rubrics as $rubric)
		{
			$string .= $rubric->title.', ';
		}
		$model['rubric'] = substr($string, 0, strlen($string)-2);
		unset($string);

		$model['comments'] = Comment::model()->findAllBySql('
		SELECT *
		FROM db_comment AS c
		INNER JOIN db_comments_books AS cb
		ON cb.commnet_id = c.id
		WHERE cb.book_id = '.$id
		);

		$model['review'] = Review::model()->findAllBySql('
		SELECT *
		FROM db_review AS r
		INNER JOIN db_reviews_books AS rb
		ON rb.review_id = r.id
		WHERE rb.book_id = '.$id
		);

		$model['files'] = Files::model()->findAllBySql('
		SELECT f.type, f.title
		FROM db_files AS f
		WHERE f.book_id = '.$id
		);


		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Book $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='book-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
