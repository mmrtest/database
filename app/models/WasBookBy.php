<?php

class WasBookBy extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $exhibitions_ex_id;

    /**
     *
     * @var string
     */
    public $museum_Goer_goer_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("was_book_by");
        $this->belongsTo(
            'Exhibitions_ex_id',
            'Exhibitions',
            'ex_id'
        );
        $this->belongsTo(
            'Museum_Goer_goer_id',
            'MuseumGoer',
            'goer_id'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'was_book_by';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WasBookBy[]|WasBookBy|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WasBookBy|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
