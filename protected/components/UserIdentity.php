<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. databases).
	 * @return boolean whether authentication succeeds.
	 */
	protected $user;

	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('email'=>$this->username));

		if (!isset($user->email))
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		elseif ($user->password !== $this->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else
		{

			//$this->type = $user->type;
			$this->setState('type', $user->type);
			$this->setState('userId', $user->id);
			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

}