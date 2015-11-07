<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionDatabase()
	{

	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$socialLogins = AccountUserSocialLogin::model()->with('user')->findAll($criteria);
		$authors = Author::model()->findAll();

		if (!empty(Yii::app()->request->getParam('name'))) {
			$method = Yii::app()->request->getParam('method');
			$name = Yii::app()->request->getParam('name');
			$born = Yii::app()->request->getParam('born');
			$death = Yii::app()->request->getParam('death');
			$description = Yii::app()->request->getParam('description');
			switch ($method) {
				case 'delete':
					if($method = 'delete')
					$this->delete($name,$born,$death,$description) ;
					break;
				case 'update':
					if($method = 'update')
					$this->update($name,$born,$death,$description) ;
					break;
				case 'insert':
					if($method = 'insert')
					$this->insert($name,$born,$death,$description) ;
					break;
				default:
					break;
			}
		}

		$this->render('index',['authors' => $authors]);
	}
	
	
	public function delete($name,$born,$death)
	{
		$criteria = new CDbCriteria();
		$criteria->params = [':name' => $name];
		$criteria->condition = 'name = :name';

		if(!empty($born))
		{
			$criteria->params[':born'] = $born;
			$criteria->addCondition('born = :born');
		}

		if(!empty($death))
		{
			$criteria->params[':death'] = $death;
			$criteria->addCondition('death = :death');
		}

		Author::model()->deleteAll($criteria);

		unset($criteria);

	}

	public function update($name,$born,$death,$description)
	{

		if (!empty($name))
		{
			$criteria = new CDbCriteria();
			$criteria->params = [':name' => $name];
			$criteria->condition = 'name = :name';
			$atributes = [];

			$post = Author::model()->findAll($criteria);
			if (!empty($post)) {

				if (!empty($born)) {
					$atributes['born'] = $born;
				}
				if (!empty($death)) {
					$atributes['death'] = $death;
				}
				if (!empty($description)) {
					$atributes['description'] = $description;
				}

				Author::model()->updateAll($atributes, $criteria);
				unset($criteria);
				unset($atributes);
			}
		}
	}

	public function insert($name,$born,$death,$description)
	{
		$post = new Author;
		$post->name = $name;
		$post->born = $born;
		$post->death = $death;
		$post->description= $description;
		$post->save();
		unset($post);
	}
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}