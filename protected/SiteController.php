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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex($rubricIdToUpdate = 27)
	{
/*		$criteria = new CDbCriteria();
        $criteria->params = [':id' => $rubricIdToUpdate];
        $criteria->condition = 'user.id = :id';//.$rubricIdToUpdate;

		print_r($criteria->condition);
		print_r($criteria->params);
        // Если передали rubricId
       /* if(!empty($rubricIdToUpdate))
        {
            $criteria->addCondition('t.id = :id');
        }
        $criteria->index = 'id';

  */
		//$socialLogins = AccountUserSocialLogin::model()->with('user')->findAll(['condition'=>'user.id=784',]);
		
/*		$socialLogins = AccountUserSocialLogin::model()->with('user')->findAll($criteria);
		
		unset($criteria);

		foreach($socialLogins as $row)
		{
			print_r($row->type);
			print_r('<br>');
		}
		/*
		$user = new AccountUser();
		$user->first_name = "qwe";
		$user->last_name = "asd";
		$user->save();
		print_r($user);*/

		$qwe = 'Hello word!';

		if (!empty(Yii::app()->request->getParam('name'))) {
			$method = Yii::app()->request->getParam('method');
			switch ($method) {
				case 'delete':
					$this->delete(Yii::app()->request->getParam('name')) ;
					break;
				case 'update':
					$this->update(Yii::app()->request->getParam('name')) ;
					break;
				case 'insert':
					$this->insert(Yii::app()->request->getParam('name')) ;
					break;
				default:
					break;
			}
		}

		$this->render('index',['qwe' => $qwe]);
	}

	public function delete($name)
	{
		$criteria = new CDbCriteria();
		$criteria->params = [':id' => $name];
		$criteria->condition = 'id = :id';

		$result = AccountUserSocialLogin::model()->findAll($criteria);
		$result->delete();
	}

	public function update($name)
	{
/*		$criteria = new CDbCriteria();
		$criteria->params = [':id' => $name];
		$criteria->condition = 'id = :id';

		AccountUserSocialLogin::model()->updateAll($criteria);*/

		$post=AccountUserSocialLogin::model()->findByPk($name);
		$post->token='new post title';
		$post->save();

	}

	public function insert($name)
	{
		$post=new AccountUserSocialLogin;
		$post->user_id = 784;
		$post->type='facebook';
		$post->user_id_in_social_network=9701721;
		$post->token= $name;
		$post->save();
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