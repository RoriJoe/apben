<?php

class UserIdentity extends CUserIdentity
{
    private $id;
 
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('nip'=>$this->username));
        
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->id=$record->id;
            $this->setState('role', $record->role);            
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId(){
        return $this->id;
    }
}