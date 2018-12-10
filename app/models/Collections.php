<?php

class Collections extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $contact_person;

    /**
     *
     * @var string
     */
    public $collections_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("collections");
        $this->hasMany(
            'Collections_id',
            'Borrow',
            'collections_id'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'collections';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Collections[]|Collections|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Collections|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
