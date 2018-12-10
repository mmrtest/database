<?php

class Borrow extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $form;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var string
     */
    public $date_return;

    /**
     *
     * @var string
     */
    public $art_Objects_id_no;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("borrow");
        $this->belongsTo(
            'Art_Objects_id_no',
            'ArtObjects',
            'id_no'
        );
        $this->belongsTo(
            'collections_id',
            'Collections',
            'Collections_id'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'borrow';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Borrow[]|Borrow|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Borrow|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
