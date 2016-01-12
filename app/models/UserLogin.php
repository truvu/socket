<?php

class UserLogin extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $pass;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var string
     */
    public $next;

    private $error = array();

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user_login';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserLogin[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserLogin
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function setError($key='', $value='')
    {
        $this->error[$key] = $value;
    }
    public function getError()
    {
        return $this->error;
    }
    public function beforeCreate()
    {
        unset($this->error);
    }
    public function beforeUpdate()
    {
        unset($this->error);
    }

    public function setEmail($value='')
    {
        if(filter_var($value, FILTER_VALIDATE_EMAIL)&&strlen($value)<101){
            $this->email = trim($value);
        }else{
            $this->setError('email', 'This email is not valid!');
        }
    }
    public function setPass($value='')
    {
        $n = strlen($value);
        if($n<6||$n>100) $this->setError('pass', 'Password about 6 to 100 chars!');
        else $this->pass = $value;
    }

    public function setCode($value='')
    {
        if(preg_match('/^[0-9]{5}$/', $value)) $this->code = $value;
        else $this->setError('code', 'This code is not valid!');
    }

}
