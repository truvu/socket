<?php
use Phalcon\Validation;

class User extends \Phalcon\Mvc\Model
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
    public $username;

    /**
     *
     * @var string
     */
    public $fname;

    /**
     *
     * @var string
     */
    public $lname;

    /**
     *
     * @var string
     */
    public $avatar;

    /**
     *
     * @var integer
     */
    public $gender=0;

    /**
     *
     * @var array
     */
    private $error=array();

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function beforeCreate()
    {
        unset($this->error);
    }

    public function setError($name='', $value='')
    {
        $this->error[$name] = $value;
    }
    public function getError()
    {
        return $this->error;
    }

    public function setName($type, $value=''){
        $n = strlen($value);
        if($n<1||$n>30) $this->setError($type, ucfirst($type).' about from 2 to 30 characters');
        elseif(preg_match('/~`!@#\$%\^&\*\(\)-_\+=\{\}\[\]|\\:;"\'<>\?\//', $value)) $this->setError($type, "$type not match");
        else return $value;
    }

    public function setFname($value='')
    {
        if($name=$this->setName('fname', $value)){
            $this->fname = $name;
        }
    }
    public function setLname($value='')
    {
        if($name=$this->setName('lname', $value)){
            $this->lname = $name;
        }
    }
    public function setGender($value='')
    {
        $gender = array('male'=>0, 'female'=>1);
        if(isset($gender[$value])) $this->gender = $gender[$value];
        else $this->setError('gender', 'Please choose gender option');
    }
}
