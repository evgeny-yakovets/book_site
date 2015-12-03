<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

    // Store model to not repeat query.
    private $_model;
    public $userId1;
    protected $_first_name;
    protected $_last_name;
    protected $_email;
    protected $_password;
    protected $userType;

    // Return first name.
    // access it by Yii::app()->user->first_name
    function getFirst_Name(){
        $user = $this->loadUser(Yii::app()->user->id);
        return $user->first_name;
    }

    // This is a function that checks the field 'role'
    // in the User model to be equal to 1, that means it's admin
    // access it by Yii::app()->user->isAdmin()
    public function isAdmin()
    {   //$userType = $this->getUserType();
        return ($this->getUserType() == 'admin');
    }

    // Load user model.
    protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }

    public function getUserId()
    {
        if(isset($this->userId))
        {
            $this->$userId = $this->userId;
            return $this->userId;
        }
        return "none";
    }

    public function getUserFirstName()
    {
        return $this->_first_name;
    }

    public function getUserLastName()
    {
        return $this->_last_name;
    }

    public function getUserEmail()
    {
        return $this->_email;
    }

    public function getUserPassword()
    {
        return $this->_password;
    }

    public function getUserType()
    {
        if(isset($this->type))
        {
            return $this->type;
        }
        return "none";
    }

    public function setUserType($type)
    {
        $this->type = $type;
    }
}