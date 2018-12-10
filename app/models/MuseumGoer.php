<?php

class MuseumGoer extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $goer_id;

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
    public $phone;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("museum_goer");
        $this->hasManyToMany(
            'goer_id',
            'WasBookBy',
            'Museum_Goer_goer_id','Exhibitions_ex_id' ,
            'Exhibitions',
            'ex_id'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'museum_goer';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MuseumGoer[]|MuseumGoer|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MuseumGoer|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
