<?php

class Timetable extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $user;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var integer
     */
    public $created;

    /**
     *
     * @var string
     */
    public $text_time;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'timetable';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Timetable[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Timetable
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
