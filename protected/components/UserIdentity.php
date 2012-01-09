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
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public function authenticate()
	{

        // first make sure it's even set
		if(!isset($this->username)){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
            return !$this->errorCode;
        }

        // same with password
		if(!isset($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
            return !$this->errorCode;
        }

        if(substr_count($this->username, '@') > 0){
            return $this->authenticate_instructor();
        }

        // fallthrough
        return $this->authenticate_hardcoded();
    }


	public function authenticate_hardcoded()
	{
		$users=array(
			'admin'=>'***REMOVED***',
			'parent'=>'***REMOVED***',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}

	public function authenticate_instructor()
	{
		return !$this->errorCode;

    }

}